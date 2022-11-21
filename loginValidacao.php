<?php
session_start();

if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];
$acao = $_SESSION['acao'];
//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuario where email='$campoemail'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 
	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {

		if($camposenha == $row['senha']){
			$_SESSION['nome'] = $row["nome"];
			$_SESSION['email'] = $row["email"];
			$_SESSION['acesso'] = $row["acesso"];
			$_SESSION['id'] = $row["id"];;
			header("Location: principal.php");
		}
			//O EasyPHP não tem password_hash, por isso deixei as duas opções
			//$verificado = password_verify($camposenha, $row["Senha"]);
			//if($verificado){			

	//Se a consulta não tiver resultados  			
	} else {
		header('Location: index.html'); //Redireciona para o form
		exit; // Interrompe o Script
	}
//Se o usuário não usou o formulário
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

//Fecha a conexão.
$conn->close();
?> 