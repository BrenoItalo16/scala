<?php
Class Usuario{
    private $pdo;
    public $msgErro = ""; //tudo ok
    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);   
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
            print $msgErro;
        }
    }

    public function cadastrar($nome, $email, $senha, $novo_nome){
        global $pdo;
        //Verificar se já existe e-mail cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE  email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; //Já está cadastrada
        } else{ //caso não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha, imagem) VALUES (:n, :e, :s, :i)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->bindValue(":i", $novo_nome);
            $sql->execute();
            return true; //tudo ok!
        }
    }

    public function logar($email, $senha){
        global $pdo;
        $senha = md5($senha);
        //verificar se o email e senha estão cadastrados, se sim...
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();


    #print "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'";
    // print $sql->rowCount();
        if($sql->rowCount() > 0){
        //entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //Logado com sucesso.
        } else{
            return false; //não conseguiu logar
        }

    }


}
?>