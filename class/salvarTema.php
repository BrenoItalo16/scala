<?php
session_start();


$_SESSION["tema"] = $_GET["css"];



$sql = "update usuarios set tema = '{$_GET["css"]}' where id = {$_SESSION["id_usuario"]}";
#salvar o tema no banco

/*
    function salvarTema($tema){
    $sql = $this->pdo->prepare("UPDATE usuario set tema = :t where id_usuario = :u");
    $sql->bindValue(":t",$_SESSION['tema']);
    $sql->bindValue(":u", $_SESSION['id_usuario']);
    $sql->execute();
    return $tema;
    }
*/
