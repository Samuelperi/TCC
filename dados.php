<!DOCTYPE html>
<html lang="ptbr">
    <head>
        <title>Dados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            $Nome = $_POST['Nome'];
            $Email = $_POST['Email'];
            $DtNascimento = $_POST['DtNas'];
            $Senha = $_POST['Senha'];

            $idade = date_diff(date_create($DtNascimento), date_create('today'))->y;

            if($idade < 16){
                session_start();
                echo "<script>alert('Você não tem idade suficiente para se cadastrar!');</script>";
                header("Refresh: 0.3; url=cadastro.html");
                exit();
            }

        ?>
    </body>
</html>