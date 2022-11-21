<?php 
session_start();

require 'conexao.php';

//Verifica o acesso.
require 'acessocomum.php';

$id = $_SESSION['id'];

$sql = "SELECT id FROM agendamento WHERE usuario_id = '$id' ORDER BY id DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
$agendamento = $row['id'];


$sql2 = "SELECT profissional.usuario_id, profissional.id, interessado.agendamento_id FROM profissional INNER JOIN interessado ON profissional.id = interessado.profissional_id WHERE interessado.agendamento_id = '$agendamento'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$usuario_id = $row2['usuario_id'];
$profissional_id = $row2['id'];


$sql3 = "SELECT nome, email, telefone FROM usuario WHERE id = '$usuario_id'";
$result3 = $conn->query($sql3);
?>
<html>
    <head>
      <title>Flash Services - Interessados</title>
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

<form action="interessados.php" method="post">
<h3>Profissinais interessados</h3>
<?php
        $row3 = $result3->fetch_assoc();
            $sql4 = "SELECT id, profissional_id FROM interessado WHERE profissional_id = '$profissional_id'";
            $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_assoc();
?>  
<h2>Nome: <?= $row3['nome'] ?></h2>
<h2>Email: <?= $row3['email'] ?></h2>
<h2>Telefone: <?= $row3['telefone'] ?></h2>

 <a class="button" href="aceitaServico.php?profissional=<?=$row4['profissional_id']?>&agendamento=<?=$agendamento?>">aceitar</a>
 <a class="button" href="recusarServico.php?profissional=<?=$row4['id']?>">recusar</a>
<?php
}
?>
