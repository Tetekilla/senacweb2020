<?php
require("db.php");
function listarusuarios(){
  $conn = conexao();
    $sql = "USE agenda;";
    $resultado = mysqli_query($conn, $sql);
    if (!$resultado) 
        die ("Erro: Seleção de Database..." .  mysqli_error($resultado). "<br />");
    
    
    $sql =   "SELECT * FROM usuario";
    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) 
        die ("Erro: " .  mysqli_error($resultado). "<br />");
            
    mysqli_close($conn);
    return $resultado;
        
}

?>