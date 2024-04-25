@extends('base')
@section('title', 'Modifier le cluster')

@section('content')
@vite('resources/css/app.css')
<h2 class="text-2xl font-bold mb-4 justify-center">Modifier le cluster</h2>

<div class="flex justify-center items-center">
    <form method="POST" action="{{ route('cluster.update',$cluster->id) }}" class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-wrap" >
        <h2 class="text-2xl mb-4 text-center font-bold w-full">Remplissez le formulaire suivant:</h2>
        @csrf
        @method('PUT')

        <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
            <label for="filiere_id">Filiere</label>
            <select name="filiere_id" id="filiere_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez une filière ">
                @foreach ($filieres as $filiere)               
                <option value="{{ $filiere->id }}" {{ $filiere->id == $cluster->filiere_id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                @endforeach 
            </select>
            @error('filiere_id')
                <span class="text-red-800 bg-red-50">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
            <label for="departement">Département</label>
            <select name="departement" id="departement" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez un département">
                @foreach ($villages as $village)
                <option value="{{ $village->arrondissement->commune->departement->id }}" {{ $village->arrondissement->commune->departement->id == $cluster->departement ? 'selected' : '' }}>{{ $village->arrondissement->commune->departement->nom }}</option>
                @endforeach 
            </select>
        </div>
        
        <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
            <label for="commune">Commune</label>
            <select name="commune" id="commune" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez une commune">
                @foreach ($villages as $village)
                <option value="{{ $village->arrondissement->commune->id }}" {{ $village->arrondissement->commune->id == $cluster->commune ? 'selected' : '' }}>{{ $village->arrondissement->commune->nom }}</option>
                @endforeach 
            </select>
        </div>

        <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
            <label for="arrondissement">Arrondissement</label>
            <select name="arrondissement" id="arrondissement" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez un arrondissemment">
                @foreach ($villages as $village)
                <option value="{{ $village->arrondissement->id }}" {{ $village->arrondissement->id == $cluster->arrondissement ? 'selected' : '' }}>{{ $village->arrondissement->nom }}</option>
                @endforeach 
            </select>
        </div>

        <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
            <label for="village_id">Village</label>
            <select name="village_id" id="village_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  placeholder="Selectionnez un arrondissemment">
                @foreach ($villages as $village)
                <option value="{{ $village->id }}" {{ $village->id == $cluster->village_id ? 'selected' : '' }}>{{ $village->nom }}</option>
                @endforeach 
            </select>

            @error('village_id')
            <span class="text-red-800 bg-red-50">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom du cluster</label>
            <input type="text" name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nom"  value="{{ $cluster->nom }}">
            @error('nom')
                <span class="text-red-800">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="w-full flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
               Modifier
            </button>
            <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-5" onclick="window.history.back()">
                Annuler
            </button>
        </div>
    </form>
</div>


<script>

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
