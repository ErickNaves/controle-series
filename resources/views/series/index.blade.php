<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Clique aqui</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }} <a href="" class="btn btn-danger">X</a></li>
        @endforeach
    </ul>
</x-layout>