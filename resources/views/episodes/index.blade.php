<x-layout title="Episódios">

    <form method="post">
        @csrf
        <ul class="list-group table-striped">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                        Episódio {{ $episode->number }}

                        <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" @if ($episode->watched) checked @endif>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mb-2 mt-2">Salvar</button>
    </form>
</x-layout>