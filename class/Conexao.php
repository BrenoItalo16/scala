<?php

abstract class Conexao{
    #conecta com o db
    protected function conectaDB(){
        try {
            $con = new PDO("mysql:host=localhost;dbname=scaladv","root","");
            return $con;
        } catch (PDOException $Erro) {
            return $Erro->getMessage();
        }

    }

}