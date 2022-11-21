<?php
    session_start();
    $agendamento = $_GET['agendamento'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="undraw_futuristic_interface_re_0cm6.svg" alt="">
        </div>
        <div class="form">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="principal.php">Voltar à página inicial</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <form action="loginServico.php?agendamento=<?=$agendamento?>" method="post">

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>
                <div class="continue-button">
                    <input type="submit" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html> 