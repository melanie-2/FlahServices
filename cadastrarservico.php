<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM servico ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);

?>	

<html>
<head>
<title>Flash Services - Escolhendo meu serviço</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/form.css">
<link rel="stylesheet" href="./css/menu.css">
</head>
<body>	

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>
	
	<form action="servicocadastrarcodigo.php" method="post">
	<h3>Serviços que eu presto</h3>
	
	<select name='servico_id' required>
	<option value=""></option>
<?php
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {			
			echo "<option value=" . $row["id"] . ">" . $row["servico"] . "</option>";
		}
	}
?>	
</select>
	<input type="submit" value="Selecionar">
	</form>

</body>
</html>
