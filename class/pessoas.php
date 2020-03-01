<?php
Class Pessoa{
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

    //Buscar dados do DB em forma de array
    public function buscarDados(){
    //    $cmd = $this->pdo->prepare("SELECT * FROM pessoa /*where id_user = :id*/");
        $cmd = $this->pdo->prepare("SELECT * FROM pessoa;");

    //    $cmd->bindValue(":id", $id);
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }


}
?>