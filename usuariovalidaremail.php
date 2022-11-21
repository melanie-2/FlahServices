<?php
session_start();

//Dados do formulário
$campoemail = filter_input(INPUT_GET, 'id');
$validador = filter_input(INPUT_GET, 'validador');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE usuario SET Status='ativo' WHERE status='aguardando' and email='" . $campoemail . "'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  header( "refresh:0.0000000000000000001;url=login.html" );	
  //Grava alteração no log.
  include 'log.php';
  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	
?> 