<x-layout title="Editar titulo da serie: '{!! $series->name !!}'">
    <form action="{{ route('series.update', $series->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Digite aqui o novo nome da série</label>
            <input type="text" 
                id="name" 
                name="name" 
                class="form-control" 
                value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>    
</x-layout>