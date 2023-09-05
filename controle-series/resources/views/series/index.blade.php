<x-layout title="Séries">
    <a href="series/create">Clique aqui</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie }}</li>
        @endforeach
    </ul>
</x-layout>