<x-layout title="Seires" :mensagem-sucesso="$mensagemSucesso">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
                <img src="{{ asset('storage/' . $serie->cover_path) }}" 
                     width="100" 
                     class="img-thumbnail" 
                     class="me-3">

                @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{ $serie->name }}
                @auth </a> @endauth
            </div>

            @auth
            <span class="d-flex">
                <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                    E
                </a>

                <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
            @endauth
        </li>
        @endforeach
    </ul>
</x-layout>