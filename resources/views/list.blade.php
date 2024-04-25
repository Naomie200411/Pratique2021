@extends('base')
@section('title', 'Détails des Oeuvres')

@section('content')

<div class="flex justify-center"> 
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg " style="width: 800px">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
            @vite('resources/css/app.css')
            <thead class="text-xs uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Cluster
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Filière
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Village
                    </th>
                    <th scope="col" class="px-6 py-3 ml-[-10]">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clusters as $cluster)
                <tr class="bg-blue-100 border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$cluster->nom}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cluster->filiere->nom}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cluster->village->nom}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex"> <!-- Utilisation de flex pour aligner les boutons -->
                            <a href="{{ route('cluster.edit', $cluster->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">Modifier</a>
                            <form action="{{ route('cluster.destroy', $cluster->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirmDelete(event)">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete(event) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer ?')) {
        event.preventDefault(); 
    }
}
</script>

@endsection
