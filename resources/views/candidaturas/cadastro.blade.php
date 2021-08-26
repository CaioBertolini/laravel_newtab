<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Candidaturas</title>

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
            select {
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
        <h1>Cadastrar Candidatura</h1>
        <form action="{{ route('candidatura_cadastro') }}" method="POST">
            @csrf
            <select name="id_vaga" required>
                <?php
                    foreach ($vagas as $vaga){
                        echo "<option value=".$vaga->id.">".$vaga->empresa."</option>";
                    }
                ?>
            </select>
            <select name="id_pessoa" required>
                <?php
                    foreach ($pessoas as $pessoa){
                        echo "<option value=".$pessoa->id.">".$pessoa->name."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>