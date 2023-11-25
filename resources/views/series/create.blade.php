<x-layout title="Nova Serie">
    <x-series.form :action="route('series.store')"/>
        <form action="{{ route('series.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label"></label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>
        
            <button type="submit" class="btn btn-primary">Adicionar</button>

        </form>    
</x-layout>    