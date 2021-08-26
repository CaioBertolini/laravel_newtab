<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Vagas</title>

        <style>
            body {
                display: flex;
                flex-direction: column;
                margin: 0;
                width: 100%;
                text-align: center;
                align-items: center;
            }
            form {
                display: flex;
                flex-direction: column;
                width: 40%;
            }
            input {
                margin-bottom: 10px;
            }
            select {
                margin-bottom: 10px;
            }
            textarea {
                margin-bottom: 10px;
            }
            a {
                text-decoration: none;
                width: 200px;
                margin: 10px;
                background-color: blue;
                color: white;
                border: 0;
                border-radius: 10px;
                padding: 10px;
                font-size: 1em;
                align-self: flex-end;
            }
        </style>

    </head>
    <body>
        <a href="/">Voltar para página inicial</a>
        <h1>Cadastrar Vaga</h1>
        <form action="{{ route('vagas_cadastro') }}" method="POST">
            @csrf
            <input type="text" name="empresa" placeholder="Empresa" required>
            <input type="text" name="titulo" placeholder="Título" required>
            <select name="localizacao" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
            </select>
            <select name="nivel" required>
                <option value=1>Estagiário</option>
                <option value=2>Júnior</option>
                <option value=3>Pleno</option>
                <option value=4>Sênior</option>
                <option value=5>Especialista</option>
            </select>
            <textarea name="descricao" cols="30" rows="10" placeholder="Descrição" required></textarea>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>