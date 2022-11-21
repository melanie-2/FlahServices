<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$id = $_SESSION['id'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT usuario.*, servico.servico FROM usuario INNER JOIN profissional 
ON usuario.id=profissional.usuario_id INNER JOIN servico 
ON profissional.servico_id=servico.id WHERE usuario.id = $id";


//Executa o SQL
$result = $conn->query($sql);




	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>FlashServices - Minha Area</title>
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


			<h1>Serviços</h1>
			<table>
<tr>
<th>Usuário</th>
<th>serviço</th>
<th>Excluir Serviço</th>
</tr>
				
	<?php
	
	
	
	  while($row = $result->fetch_assoc()) {
	        

					echo "<tr><td><a href='profissionalcontrolar.php?servico=" . $row["id"] . "'>" . $row["nome"] . "</td><td>" . $row["servico"] . "</td>";
					echo "<td><a href='minhaareaexcluir.php?id=" . $row["id"] . "'><img src='./images/excluir1.png' alt='Excluir Usuário'></a></td></tr>";
		
		}
	?>
				 
			</table>
</div>
 
    <a href="cadastrarservico.php"><img src="./images/incluir.png" alt="Incluir Serviço"></a>
    </div>

<?php
	$sql2 = "SELECT agendamento.id, agendamento.usuario_id, agendamento.servico_id, agendamento.data, agendamento.hora, agendamento.endereco, agendamento.start, agendamento.end, usuario.nome, servico.servico
FROM agendamento 
INNER JOIN usuario ON agendamento.usuario_id = usuario.id 
INNER JOIN servico ON agendamento.servico_id = servico.id
WHERE usuario.id = '$id' ORDER BY agendamento.id";

$result2 = $conn->query($sql2);

	
?>

       <h1>Serviços Agendados</h1>
<table>
			<tr>
				<th>Usuário</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Serviço</th>
				<th>Cancelar</th>
			</tr>

			<?php
	
	
	
	  while($row2 = $result2->fetch_assoc()) {
                $data = $row2['data'];
                $data = date("d/m/Y", strtotime($data));

					echo "<tr>
					<td>" . $row2["nome"] . "</td>
					<td>
					<a href='profissionalcontrolar.php?servico=" . $row2["id"] . "'>$data</td>
					<td>" . $row2["hora"] . "</td>
					<td>" . $row2["servico"] . "</td>";
					echo "<td><a href='agendamentoexcluir.php?id=" . $row2['id'] . "'><img src='./images/excluir1.png' alt='Excluir Usuário'></a></td></tr>";
		
		}
	?>

		</table>


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