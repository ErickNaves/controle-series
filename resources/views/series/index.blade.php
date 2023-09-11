<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Clique aqui</a>

    @isset ($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group table-striped">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}
                <form action="{{ route('series.destroy', $serie->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-danger btn-sm">X</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>