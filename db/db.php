<?php
  
  function conexao(){

    $url = "getenv('host')";
    $user = "getenv('root')";
    $pass = "getenv('password')";
  
     $conn = mysqli_connect($url, $user, $pass,);
     
     if (!$conn)  
      die("Erro: " . mysqli_connect_error() . "<br/>");
         echo "DB: ok...<br/>";

    return $conn;
  }


?>