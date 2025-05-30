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
        <h1> Copy Generator AI 🤖 </h1>
        <nav>
            <a href="/">Voltar</a>
        </nav>
    </header>

    <main>
        <h2> Gerador De Copy's </h2>
        <p> Bora Ficar Rico Divulgando Produtos? </p>
        <article>
            <form id="copyForm" method="POST" action="{{ route('copyAcao') }}">
                @csrf
                <p>
                    <label for="">Nome do Produto</label>
                    <input type="text" name="nome_produto" required>
                </p>
                <p>
                    <label for="">Preço do Produto</label>
                    <input type="number" name="preco_produto" required>
                </p>
                <p>
                    <label for="">Característica do Produto</label>
                    <input type="text" name="caracteristicas_produto" required>
                </p>
                <p>
                    <label for="">Público Alvo</label>
                    <input type="text" name="publico_alvo" required>
                </p>
                <p>
                    <label for="">Estilo da Copy</label>
                    <select name="estilo_copy">
                        <option value="formal">Formal</option>
                        <option value="descontraida">Descontraída</option>
                        <option value="vida_louca">Vida Louca</option>
                    </select>
                </p>
                <p>
                    <input type="submit" value="Bora!">
                </p>
                @if(!empty($copyGerada))
                    {!! preg_replace("/\r\n|\n/", '<br>', $copyGerada) !!}
                @endif
            </form>
        </article>

    </main>

    <footer>
        CodifySchool - 2025
    </footer>

</body>
</html>
