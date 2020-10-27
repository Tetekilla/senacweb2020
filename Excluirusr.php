<?php
if (!isset($_GET['codigo']))
    header('Location: dashboard.php');
require('db/db.php');
$codigo = $_GET['codigo'];
$conn = conexao();
$sql  = "USE agenda;";
$resultado = mysqli_query($conn, $sql);
if (!$resultado)
        die("Erro: Seleção database..." . mysqli_error($conn). "<br />");

$sql = "DELETE FROM usuario WHERE codigo=" . $codigo . ";";
$resultado = mysqli_query($conn, $sql);
if (!$resultado)
        die("Erro: " . mysqli_error($conn). "<br />"); 
     mysqli_close($conn);
     header('Location: dashboard.php');

?>