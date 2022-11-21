<?php
session_start(); 

//Verifica o acesso.
//require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
 
//Faz a conexão com o BD.
require 'conexao.php';

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM agendamento WHERE id='$campoid'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Agendamento apagado";
  
  include 'log.php';
  
   header('Location: listadeagendamentos.php'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>