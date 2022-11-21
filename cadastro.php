<?php
    include("conexao.php");
	
	$camponome = $_POST["nome"];
    $campoemail = $_POST["email"];
    $campotelefone = $_POST["telefone"];
    $camposenha = $_POST["senha"];
	
	$sql = "INSERT INTO cadastro(nome, email, telefone, senha)
	VALUES('$camponome', '$campoemail', '$campotelefone', '$camposenha')";
	
	  if(mysqli_query($conexao, $sql)){
		  echo "Usuário cadastrado com sucesso";
	  }
	  else{
		  echo "Erro".mysqli_connect_error($conexao)
	  }
	  mysqli_close($conexao);
	?>
	 
