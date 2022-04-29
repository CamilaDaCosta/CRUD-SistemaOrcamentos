<div>
    <h2>Lista de Produtos|||<a href="/produto/create">Cadastrar Novo Produto</a></h2>
    <div>
        @foreach ($produtos as $produto)
            <div>
                <p>Produto: {{ $produto->descricao }}</p>
                <p>Preço: {{ $produto->valor }}</p>
                <a href="/produto/{{ $produto->id }}">Ver Mais</a>
            </div>
        @endforeach
    </div>
</div>
