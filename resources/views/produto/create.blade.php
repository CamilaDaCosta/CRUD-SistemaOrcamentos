<div>
    <h1>Cadastrar Produtos</h1>
    <form action="/produto" method="POST">
        @csrf
        <div>
            <label for="title">Descrição:</label>
            <input type="text" id="descricao" name="descricao" placeholder="Descrição do Produto">
        </div>

        <div>
            <label for="title">Material:</label>
            <input type="text" id="material" name="material" placeholder="Material do Produto">
        </div>

        <div>
            <label for="title">Unidade:</label>
            <input type="text" id="unidade" name="unidade" placeholder="Unidade do Produto">
        </div>

        <div>
            <label for="title">Espessura</label>
            <input type="text" id="espessura" name="espessura" placeholder="Espessura do Produto">
        </div>
        <div>
            <label for="title">Valor:</label>
            <input type="text" id="valor" name="valor" placeholder="Valor do Produto">
        </div>
        <input type="submit" value="Cadastrar">
    </form>
</div>
