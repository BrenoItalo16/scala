<?php
Class Escala{
    private $pdo;
    public $msgErro = ""; //tudo ok
    public function __construct($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);   
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
            print $msgErro;
        }
    }

    //Inserir dados no BD
    
    public function cadastrar($nome, $email, $senha, $novo_nome){
        global $pdo;
        
            $sql = $pdo->prepare("INSERT INTO escala (pregador, inicialum, inicialdois,
                                                       especialum, especialdois, diaconoum, diaconodois,
                                                       plataformaum, plataformadois) VALUES (:p, :inu, 
                                                       :ind, :eu, :ed, :du, :dd, :plu, :pld)");
            $sql->bindValue(":p", $pregador);
            $sql->bindValue(":inu", $inicialum);
            $sql->bindValue(":ind", $inicialdois);
            $sql->bindValue(":eu", $especialum);
            $sql->bindValue(":ed", $especialdois);
            $sql->bindValue(":du", $diaconoum);
            $sql->bindValue(":dd", $diaconodois);
            $sql->bindValue(":plu", $plataformaum);
            $sql->bindValue(":pld", $plataformadois);
            $sql->execute();
            return true; //tudo ok!
        }
    }


}
?>