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
        <h1> MuskAI 🤖 </h1>
    </header>

    <main>
        <h2> Gerador De Receitas </h2>
        <p> Econtre Receitas Deliciosas em seus Ingredientes da Geladeira - Inteligência Artificial Transformando suas
            Comidas em Obra de Arte</p>
        <article>
            <label>Ingredientes</label>
            <form action="{{ route('ingredientesAcao') }}" method="POST">
                @csrf
                <input type="text" name="ingredientes">
                <input type="submit" value="Senta o dedo nessa coisa">
            </form>
        </article>
    </main>

    <footer>
        CodifySchool - 2025
    </footer>

</body>

</html>
