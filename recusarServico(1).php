<?php 
session_start();

require 'conexao.php';

//Verifica o acesso.
require 'acessocomum.php';

$profissional = $_GET['profissional'];

$sql = "DELETE FROM interessado WHERE id = '$profissional'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE){

    header("Location: interessados.php");
    exit;
 }else {
   echo "Erro: " . $conn->error;
 }
?>