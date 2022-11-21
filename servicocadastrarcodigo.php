<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

// Dados do Formulário
$campousuario_id = $_SESSION['id'];
$camposervico_id = $_POST["servico_id"];    
	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO profissional(usuario_id, servico_id) VALUES($campousuario_id, $camposervico_id)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  //header( "refresh:5;url=servicocontrolar.php" );	
include 'log.php';
header( "refresh:4;url=http://flashservices.epizy.com/cadastrarservico.php");
} else {
  //header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 


?>

 <!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FlashServices - Confirmado</title>
        <link rel="stylesheet" href="styletela.css">
    </head>
    <body>
    <div class="container">
        <div class = "popup">
            <img src="tick.png">
            <h2>Muito Obrigado!</h2>
            <p>O serviço foi escolhido com sucesso! Muito obrigado!</p>
            <button type="button" onclick="closePopup()"><a href="http://flashservices.epizy.com/principal.php">OK</button>
        </div>
    </div>

    <script>
    let popup = document.getElementById("popup");

    </script>
    </body>
</html>    