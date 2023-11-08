<x-layout title="Séries" :mensagemSucesso="$mensagemSucesso">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Clique aqui</a>

    <ul class="list-group table-striped">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <img src="{{ asset('storage/' . $serie->cover) }}" width="100px" class="thumbnail me-3" alt="">
                    <a href="{{ route('seasons.index', $serie->id) }}">
                        {{ $serie->nome }}
                    </a>
                </div>
                @auth
                <span class="d-flex">
                    <a href="{{ route('series.edit', $serie->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('series.destroy', $serie->id)}}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>