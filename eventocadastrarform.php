<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
$email = $_SESSION['email'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM servico ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);

?>	


<html>
<head>
<title>Flash Services - Agendamento</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/form.css">
</head>
<body>
<?php

//Verifica se o usuário está logado.
//require 'acessocomum.php';

//Lê a data e hora clicadas pelo usuário.
$date=new \DateTime($_GET['date'],new \DateTimeZone('America/Sao_Paulo'));
?>
<form name="formAdd" id="formAdd" method="post" action="eventocadastrarcodigo.php"> <form action="servicocadastrarcodigo.php" method="post">
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>" readonly><br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>" readonly><br>
    Usuário: <input type="text" name="name" id="name" value="<?php echo $_SESSION['nome']; ?>" readonly>
	Endereço: <input type="text" name="endereco" id="endereco" >
	Descrição: <input type="text" name="descricao" id="descricao" >
	
	Serviço: 	<select name="servico_id" required>
<?php
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {			
			echo "<option value=" . $row["id"] . ">" . $row["servico"] . "</option>";
		}
	}
?>	
</select>
    <input type="submit" value="Confirmar">
</form>

</body>
</html>
