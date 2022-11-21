<?php
session_start();
$agendamento = $_GET['agendamento'];
echo $_SESSION['id'];
if(!isset($_SESSION['id'])){
    header("refresh:0;url=login2.php?agendamento=$agendamento");
} else{
//Faz a conexão com o BD.
require 'conexao.php';


$sql = "SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.descricao, agendamento.endereco, usuario.nome, servico.servico FROM agendamento INNER JOIN usuario ON agendamento.usuario_id = usuario.id INNER JOIN servico ON agendamento.servico_id = servico.id WHERE agendamento.id = '$agendamento'";

$result = $conn -> query($sql);
$row = $result->fetch_assoc();

?>
<html>

<head>
      <link rel="stylesheet" href="stylea.css">
    <title>Oportunidade de trabalho</title>
</head>
<body>

  <div class="container"> 
    <div class="row">
   <div class="col-md-4 offset-md-4 mail-form">
   <h2 class="text-center">
    <p>Nome: <?php echo $row['nome']?></p>
    <p>Serviço: <?php echo $row['servico']?></p>
    <p>Endereço: <?php echo $row['endereco']?></p>
    <p>Data: <?php echo $row['data']?></p>
    <p>Hora: <?php echo $row['hora']?></p>
    <p>Descrição: <?php echo $row['descricao']?></p>
      <div class="form-group">
    <a href="http://flashservices.epizy.com/aceitarServico.php?agendamento=<?= $row['id']?>">Aceitar</a>
</body>

</html>
<?php }
?>