<?php
if (!isset($_POST['nome']) ||
!isset($_POST['email']) || 
!isset($_POST['senha']) ||
$_POST['nome'] == "" ||
$_POST['email'] == "" ||
$_POST['senha'] == "" )
header('Location: dashboard.php');

require('db/db.php');
$conn = conexao();
$sql  = "USE agenda;";
$resultado = mysqli_query($conn, $sql);
if (!$resultado)
        die("Erro: Seleção database..." . mysqli_error($conn). "<br />");

$sql = "INSERT INTO usuario (nome, email, senha)";
$sql .= "VALUES ('" . $_POST['nome'] . "', '" . $_POST['email'] . "', '"  . $_POST ['senha'] . "')";
$resultado = mysqli_query($conn, $sql);
if (!$resultado)
        die("Erro: Seleção database..." . mysqli_error($conn). "<br />");
        mysqli_close($conn);

?>