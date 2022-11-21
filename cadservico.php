<?php
session_start();
if (isset($_POST['senha'])){
// Dados do Formulário
$campoprofissional = $_POST["profissional"];


//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM servico where servico='$camposervico'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 
	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {

						
			
				$_SESSION['servico'] = $row["servico"];
				
				header('Location: principal.php');
				exit;
			
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