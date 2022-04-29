<div>
    <div>
        <div>
            <h2>{{ $produto->descricao }}</h2>
            <p>Material: {{ $produto->material }}</p>
            <p>Unidade: {{ $produto->unidade }}</p>
            <p>Espessura: {{ $produto->espessura }}</p>
            <p>Valor: {{ $produto->valor }}</p>
        </div>
    </div>
    <a href="/produto/edit/{{ $produto->id }}">Update</a>
    <form action="/produto/{{ $produto->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
