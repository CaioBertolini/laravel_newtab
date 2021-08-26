<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <style>
            body {
                margin: 0;
                width: 100%;
                text-align: center;
            }
            .botoes {
                display: flex;
                flex-direction: column;
                width: 100%;
                align-items: center;
            }
            a {
                text-decoration: none;
                width: 300px;
                margin: 10px;
                background-color: blue;
                color: white;
                border: 0;
                border-radius: 10px;
                padding: 20px;
                font-size: 1.3em;
            }

        </style>

    </head>
    <body>
        <h1>API para cadastro de usuários</h1>
        <div class="botoes">
            <a href="/v1/vagas/cadastro">Cadastrar Vaga</a>
            <a href="/v1/pessoas/cadastro">Cadastrar Candidato</a>
            <a href="/v1/candidatura/cadastro">Cadastrar Candidatura</a>
            <a href="">Ver lista de Candidaturas</a>
        </div>
    </body>
</html>
