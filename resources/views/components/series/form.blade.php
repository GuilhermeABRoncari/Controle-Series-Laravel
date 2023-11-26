
<form action="{{ $action }}" method="post">
    @csrf

    @if($updade)
    @method('PUT')
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label"></label>
        <input type="text" 
               id="nome" 
               name="nome" 
               class="form-control" 
               @isset($nome) value="{{ $nome }}" @endisset>
    </div>
        
    <button type="submit" class="btn btn-primary">Adicionar</button>

</form>        
