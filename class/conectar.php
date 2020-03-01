<?php
  session_start();
  if(isset($_SESSION['id_usuario'])){
      require_once 'class/usuarios.php';
      $u = new Usuario("scala","localhost","root","");

      $dados = $u->buscarDados($_SESSION['id_usuario']);
      $nome = $dados["nome"];
      
      $priNome = $nome;
      $priNome = explode(" ", $priNome);
      $priNome = $priNome[0];
      $img = $priNome.".jpg";
      $img = strtolower($img);
  
  }else{
      $img = "user.jpg";
      $nome = "Entrar";
      Header("Location: login.php");
  }

?>