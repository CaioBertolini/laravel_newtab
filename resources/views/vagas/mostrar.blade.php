<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Listar de Score de Candidaturas</title>

        <style>
            body {
                display: flex;
                flex-direction: column;
                margin: 0;
                width: 100%;
                text-align: center;
                align-items: center;
            }
            div {
                display: flex;
                flex-direction: row;
                width: 40%;
                align-items: center;
                justify-content: center;
            }
            select {
                margin-bottom: 10px;
                width: 50%;
                height: 30px;
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
            button {
                margin-left: 10px;
                margin-bottom: 10px;
                height: 30px;
                width: 70px;
                background-color: green;
                border: 0;
                border-radius: 10px;
                color: white;
                cursor: pointer;
            }
            table {
                margin: 20px;
                width: 90%;
            }
        </style>

    </head>
    <body>
        <a href="/">Voltar para página inicial</a>
        <h1>Listar Score de Candidaturas</h1>
        <div>
            <select name="id" id="id" required>
                <?php
                    foreach ($vagas as $vaga){
                        echo "<option value=".$vaga->id.">".$vaga->titulo." - ".$vaga->empresa."</option>";
                    }
                ?>
            </select>
            <button onclick="RedirectVaga()">Listar</a>
        </div>
        <table>
            <tr>
                <th>Nome</th>
                <th>Profissão</th>
                <th>Localização</th>
                <th>Nível</th>
                <th>Score</th>
            </tr>
            <?php
                foreach ($candidatura_pessoa as $pessoa){
                    echo "<tr>";
                    echo "<td>".$pessoa->name."</td>";
                    echo "<td>".$pessoa->profissao."</td>";
                    echo "<td>".$pessoa->localizacao."</td>";
                    echo "<td>".$pessoa->nivel."</td>";
                    echo "<td>".$pessoa->score."</td>";
                    echo "</tr>";  
                };  
            ?>
        </table>
    </body>
    <script>
        function RedirectVaga(){
            var e = document.getElementById("id");
            var strId = e.value;
            return window.location.replace('/v1/vagas/'+strId+'/candidaturas/ranking');
        }
    </script>
</html>