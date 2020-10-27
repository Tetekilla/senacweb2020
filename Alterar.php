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






$sql = "UPDATE usuario SET nome='" . $_POST['nome'] . "',";
$sql .= "email='" . $_POST['email'] . "', ";
$sql .= "senha='" . $_POST['senha'] . "' ";
$sql .= "WHERE codigo=" . $_POST['codigo'] . ";";
$resultado = mysqli_query($conn, $sql);

if (!$resultado)
die("Erro: Alterar database..." . mysqli_error($conn). "<br />");
mysqli_close($conn);
header('location: dashboard.php');
?>