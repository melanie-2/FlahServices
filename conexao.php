<?php
// Parâmetros para criar a conexão
$servername = "sql100.epizy.com";
$username = "epiz_32511970";
$password = "rMtBVQIHtu2";
$dbname = "epiz_32511970_flashservices";

// Criando a conexão
$conn = new mysqli ($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
  die("Você se deu mal: " . $conn->connect_error);
}
?>
