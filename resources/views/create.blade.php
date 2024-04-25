@extends('base')
@section('title', 'ENREGISTREMENT DES CLUSTERS')

@section('content')
@vite('resources/css/app.css')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="flex justify-center items-center h-full">
    <form method="POST" action="{{ route('cluster.store') }}" class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="clusterForm">
        <h2 class="text-2xl mb-4 text-center font-bold">Remplissez le formulaire suivant:</h2>
        @csrf
        <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
            <label for="filiere_id">Filiere</label>
            <select name="filiere_id" id="filiere_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez une filière ">
                @foreach ($filieres as $filiere)
               
                <option value="{{ $filiere->id }}">{{ $filiere->nom }} </option>
                @endforeach 
            </select>
            @error('filiere_id')
                <span class="text-red-800 bg-red-50">{{ $message }}</span>
            @enderror
        </div>
            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                <label for="departement">Département</label>
                <select name="departement" id="departement" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez un département">
                    @foreach ($villages as $village)
                   
                    <option >{{ $village->arrondissement->commune->departement->nom }} </option>
                    @endforeach 
                </select>
            </div>
            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                <label for="commune">Commune</label>
                <select name="commune" id="commune" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez une commune">
                    @foreach ($villages as $village)
                   
                    <option >{{ $village->arrondissement->commune->nom }} </option>
                    @endforeach 
                </select>
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                <label for="arrondissement">Arrondissement</label>
                <select name="arrondissement" id="arrondissement" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez un arrondissemment">
                    @foreach ($villages as $village)
                   
                    <option >{{ $village->arrondissement->nom}} </option>
                    @endforeach 
                </select>
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                <label for="village_id">Village</label>
                <select name="village_id" id="village_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez un arrondissemment">
                    @foreach ($villages as $village)
                   
                    <option value ="{{ $village->id }}">{{ $village->nom}} </option>
                    @endforeach 
                </select>

                @error('village_id')
                <span class="text-red-800 bg-red-50">{{ $message }}</span>
              @enderror
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom du cluster</label>
                <input type="text" name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nom" >
                @error('nom')
                    <span class="text-red-800">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center mt-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Ajouter
                </button>
    
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-5" onclick="resetForm()">
                    Annuler
                </button>
            </div>
            
        </div>
        
    </form>
</div>
<script>


    function resetForm() {
        $('#clusterForm').find('input, select, textarea').val('');
    }
   
    $(document).ready(function() {
        $('#departement').change(function() {
            var selectedDepartement = $(this).val();
            $('#commune').html('');
    
            @foreach ($villages as $village)
                var communeDepartement = '{{ $village->arrondissement->commune->departement->nom }}';
                if (communeDepartement === selectedDepartement) {
                    var communeNom = '{{ $village->arrondissement->commune->nom }}';
                    var option = $('<option>').text(communeNom).val(communeNom);
                    $('#commune').append(option);
                }
            @endforeach
        });
    });
    </script>
    
@endsection
