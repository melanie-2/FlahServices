<?php 
session_start();

require 'conexao.php';

$camponome = $_SESSION['nome'];
$campoemail = $_SESSION['email'];
$texto = "para fazer a avaliacao <a href='http://flashservices.epizy.com/avaliacao.php'>clique aqui</a>";


//Verifica o acesso.
require 'acessocomum.php';

$profissional = $_GET['profissional'];
$agendamento = $_GET['agendamento'];

$sql = "UPDATE agendamento SET profissional_id = '$profissional', status = 'Aceito' WHERE id = '$agendamento'";

require 'enviaremail.php';  

enviaremail($camponome, $campoemail, 'Profissional interessado', $texto);

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE){

    header("Location: interessados.php");
    exit;
 }else {
   echo "Erro: " . $conn->error;
 }
?>