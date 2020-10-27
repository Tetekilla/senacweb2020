<?php
require('db/DAOUsuario.php');
if (isset($_GET['procura']) && $_GET['procura'] != '' ) {
  $conn = conexao();
  $sql  = "USE agenda;";
  $resultado = mysqli_query($conn, $sql);
  if (!$resultado)
      die("Erro: Seleção database..." . mysqli_error($conn). "<br />");

      $sql = "SELECT * FROM usuario WHERE nome LIKE '%" . $_GET['procura'] . "%';";

$res = mysqli_query($conn, $sql);
if (!$res)
    die("Erro: " . mysqli_error($res) . "<br />");
} else {
  $res = listarusuarios();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>docs</title>
</head>

<body>
    <h1>Usuários</h1>
    <div class="container">
    <form action="InserirUsr.php" method="POST"> 
    <input type="text" name="nome" placeholder="Digite seu Nome" /><br />
    <input type="email" name="email" placeholder="Digite seu Email" /><br />
    <input type="password" name="senha" placeholder="Digite sua Senha" /><br />

    <input type="Submit" value="Adicionar" /><br/>
    </form>

    <form action="dashboard.php" method="GET">
      <input type="text" name="procura" />
      <input type="submit" value="Procurar" />

    </form>
    <table border="1">
      <tr>
        <th>Alterar</th>
        <th>Código</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Apagar</th>
      </tr>
<?php if(mysqli_num_rows($res) > 0 ) { ?>
<?php while($linha = mysqli_fetch_assoc($res)) { ?>
      <tr>
        <td><a href="Alterarusr.php?codigo=<?= $linha['codigo'] ?>">Aterar</a></td>
        <td><?= $linha ['codigo'] ?></td>
        <td><?= $linha ['nome'] ?></td>
        <td><?= $linha ['email'] ?></td>
        <td><a href="Excluirusr.php?codigo=<?= $linha['codigo'] ?>">Excluir</a></td>
      </tr>
<?php } }?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>