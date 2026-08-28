<!DOCTYPE html>
<html lang="ptbr">
    <head>
        <title>Dados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            $Usuario = $_POST['Usuario'];
            $Senha = $_POST['Senha'];
            
            $conexao = new mysqli("localhost", "root", "", "chagasnet");
                    //(localizado no proprio computador, usuário root, sem senha, banco de dados chagasnet)
            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            if (filter_var($Usuario, FILTER_VALIDATE_EMAIL)) {
                $sql = "SELECT * FROM usuario WHERE email = ?";
                echo "Login usando e-mail";
            } else {
                $sql = "SELECT * FROM usuario WHERE nome = ?";
                echo "Login usando nome de usuário";
            }

            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("s", $Usuario);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $Usuario = $resultado->fetch_assoc();

                echo "Usuário encontrado!";
                echo "<br>Nome: " . $Usuario['nome'];

            } else {
                echo "Nome ou e-mail não cadastrado.";

            }


        ?>
    </body>
</html>