<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT agendamento.id, agendamento.usuario_id, agendamento.servico_id, agendamento.data, agendamento.hora, agendamento.endereco, agendamento.start, agendamento.end, usuario.nome, servico.servico
FROM agendamento 
INNER JOIN usuario ON agendamento.usuario_id = usuario.id 
INNER JOIN servico ON agendamento.servico_id = servico.id
ORDER BY agendamento.id";

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


		<h1>Lista de Agendamentos</h1>
		<table>
			<tr>
				<th>Usuário</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Serviço</th>
				<th>Cancelar</th>
			</tr>

			<?php
	
	
	
	  while($row = $result->fetch_assoc()) {
					echo "<tr>
					<td>" . $row["nome"] . "</td>
					<td>
					<a href='profissionalcontrolar.php?servico=" . $row["id"] . "'>" . $row["data"] . "</td>
					<td>" . $row["hora"] . "</td>
					<td>" . $row["servico"] . "</td>";
					echo "<td><a href='agendamentoexcluir.php?id=" . $row['id'] . "'><img src='./images/excluir1.png' alt='Excluir Usuário'></a></td></tr>";
		
		}
	?>

		</table>
	</div>

	<a href="agendascontrolar.html"><img src="./images/incluir.png" alt="novo agendamento"></a>
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