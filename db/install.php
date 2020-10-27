<?php

require('db.php');

function creatdatabase($nomedobanco){
        $conn = conexao();
        $sql = "CREATE OR REPLACE DATABASE " . $nomedobanco;

            $resultado = mysqli_query($conn, $sql);
     if (!$resultado)
        die("Erro: Criação database..." . mysqli_error($conn). "<br />");

     echo "DB database criado....<br />";  
     mysqli_close($conn);
}

function criardbusr($nomedobanco) {
    echo "DB: Criando Tabela...<br/>";
    $conn = conexao();
    
    $sql = "USE " . $nomedobanco . ";";
    $resultado = mysqli_query($conn, $sql);

     if (!$resultado) 
        die ("Erro: Seleção de Database..." .  mysqli_error($conn). "<br />");
     echo "DB: Database Selecionado...<br/>";

    $sql  = "CREATE TABLE usuario (";
    $sql  .= "codigo INT NOT NULL AUTO_INCREMENT,";
    $sql  .= "nome VARCHAR(250),";
    $sql  .= "email VARCHAR(100),";
    $sql  .= "senha VARCHAR(100),";
    $sql  .= "PRIMARY KEY (codigo)";
    $sql  .= ");";
       $resultado = mysqli_query($conn, $sql);
       if (!$resultado) 
        die ("Erro: Criação Tabela Usuario..." .  mysqli_error($conn). "<br />");
        echo "DB: Tabela do Usuário Criada...<br/>";
        mysqli_close($conn);
      }

function popularuser($nomedobanco) {
          echo "DB: Populando Tabela...<br/>";
   $conn = conexao();
   
   $sql = "USE " . $nomedobanco . ";";
   $resultado = mysqli_query($conn, $sql);
      if (!$resultado) 
         die ("Erro: Seleção de Database..." .  mysqli_error($conn). "<br />");
          echo "DB: Database Selecionado...<br/>";
   
      $sql  = "INSERT INTO usuario (nome, email, senha)";
      $sql  .= "VALUES ('Fulano de tal', 'fulano@email.com', '1');";
      $sql  .= "INSERT INTO usuario (nome, email, senha)";
      $sql  .= "VALUES ('Beltrano de tal', 'beltrano@email.com', '2');";
      $sql  .= "INSERT INTO usuario (nome, email, senha)";
      $sql  .= "VALUES ('Celtrano de tal', 'celtrano@email.com', '3');";
      $sql  .= ");";
   $resultado = mysqli_multi_query($conn, $sql);

   if (!$resultado) 
         die ("Erro: População da Tabela de Usuário..." .  mysqli_error($conn). "<br />");
          echo "DB: Populando Tabela Usuário...<br/>";
          mysqli_close($conn);

}
creatdatabase("agenda");
criardbusr("agenda");
popularuser("agenda");

?>