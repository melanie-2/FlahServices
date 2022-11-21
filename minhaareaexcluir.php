<?php
session_start(); 

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
 
//Faz a conexão com o BD.
require 'conexao.php';

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM profissional WHERE id='$campoid'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Serviço apagado";
  
  include 'log.php';
  
   header('Location: minhaarea.php'); 
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>