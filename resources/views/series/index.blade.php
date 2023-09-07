<x-layout title="Séries">
    <a href="series/create" class="btn btn-dark mb-2">Clique aqui</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
</x-layout>