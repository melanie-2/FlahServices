<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT
    usuario.*,
    servico.servico
FROM
    usuario
INNER JOIN
    profissional ON usuario.id=profissional.usuario_id
LEFT JOIN
    servico ON profissional.servico_id=servico.id";


//Executa o SQL
$result = $conn->query($sql);


	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Modelo PHP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabela.css">
<link rel="stylesheet" href="./css/menu.css">
<link rel="stylesheet" href="./css/padrao.css">

</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">


			<h1>Lista de profissionais</h1>
			<table>
<tr><th>Usuário</th><th>serviço</th></tr>
				
	<?php
	
	
	
	  while($row = $result->fetch_assoc()) {
	        

					echo "<tr><td><a href='profissionalcontrolar.php?servico=" . $row["id"] . "'>" . $row["nome"] . "</td><td>" . $row["servico"] . "</td>";
					
		
		}
	?>
				
			</table>
</div>
 
    <a href="turmacadastrartela.php"><img src="./images/incluir.png" alt="Incluir Turma"></a>
    </div>
<div class="footer">
  <p>Projeto Final</p>
</div>

</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
//Fecha a conexão.	
	$conn->close();
	
?> 