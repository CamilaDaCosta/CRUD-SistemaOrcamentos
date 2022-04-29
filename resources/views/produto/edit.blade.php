<div>
    <h1>Editando Produto: {{ $produto->descricao }}</h1>
    <form action="/produto/update/{{ $produto->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Descrição:</label>
            <input type="text" id="descricao" name="descricao" placeholder="Descrição do Produto"
                value="{{ $produto->descricao }}">
        </div>

        <div class="form-group">
            <label for="title">Material:</label>
            <input type="text" id="material" name="material" placeholder="Material do Produto"
                value="{{ $produto->material }}">
        </div>

        <div>
            <label for="title">Unidade:</label>
            <input type="text" id="unidade" name="unidade" placeholder="Unidade do Produto"
                value="{{ $produto->unidade }}">
        </div>

        <div>
            <label for="title">Espessura</label>
            <input type="text" id="espessura" name="espessura" placeholder="Espessura do Produto"
                value="{{ $produto->espessura }}">
        </div>

        <div>
            <label for="title">Valor:</label>
            <input type="text" id="valor" name="valor" placeholder="Valor do Produto" value="{{ $produto->valor }}">
        </div>

        <input type="submit" value="Atualizar">
    </form>
</div>
