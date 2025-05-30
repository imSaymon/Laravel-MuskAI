<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>MuskAI</title>
</head>

<body>
    <header>
        <h1> Gerador De Receitas 🤖 </h1>
        <nav>
            <a href="/">Voltar</a>
        </nav>
    </header>

    <main id="ingredientes">
        <h2> Gerador De Receitas </h2>
        <p> Econtre Receitas Deliciosas em seus Ingredientes da Geladeira - Inteligência Artificial Transformando suas
            Comidas em Obra de Arte! </p>
        <article>
            <label> Ingredientes </label>
            <form method="POST" action="{{ route('ingredientesAcao') }}">
                @csrf
                <input type="text" name="ingredientes" value="{{ $ingredientes ?? '' }}">
                <input type="submit" value="Bora Cozinhar!">
            </form>
        </article>

        @if(!empty($receita))
            {!! preg_replace("/\r\n|\n/", '<br>', $receita) !!}
        @endif
    </main>

    <footer>
        CodifySchool - 2025
    </footer>

</body>
</html>
