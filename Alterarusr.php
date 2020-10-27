<?php
if (!isset($_GET['codigo']))
header('Location: dashboard.php');
require("db/db.php");
  $conn = conexao();
    $sql = "USE agenda;";
    $resultado = mysqli_query($conn, $sql);
                 if (!$resultado) 
                     die ("Erro: Seleção Database..." .  mysqli_error($resultado). "<br />");

        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM usuario WHERE codigo=" . $codigo . ";";
        $resultado = mysqli_query($conn, $sql);
                if (!$resultado)
                    die("Erro: " . mysqli_error($conn). "<br />");
    
                if (mysqli_num_rows($resultado) <=0 )
                    die("Erro: Código não Existente!");
       
    
        $linha = mysqli_fetch_assoc($resultado);
        mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Alterar Usuário <?= $linha ['nome']?></h1>
    <form action=Alterar.php method="POST">
    <input type="hidden" name="codigo" value="<?= $linha['codigo'] ?>"/>
    <input type="text" name="nome" value="<?= $linha['nome'] ?>"/>
    <input type="email" name="email" value="<?= $linha['email'] ?>"/>
    <input type="password" name="senha" placeholder="Digite sua senha" /><br />

    <input type="submit" value="Alterar" />
    
    </form>
</body>
</html>