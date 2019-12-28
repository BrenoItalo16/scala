<?php
require_once 'class/usuarios.php';
$u = new Usuario("scala","localhost","root","");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/login.css">
    </head>
<body>
    <div class="container">
        <div id="corpo-form">
            <h1>Entrar</h1>
            <form method="POST">
                <input type="email" name="email" placeholder="Insira seu email">
                <input type="password" name="senha" placeholder="Insira a Senha">
                <input type="submit" value="Acessar">
                <a href="signup.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
            </form>
        </div>
    </div>
<?php
    if(isset($_POST['email'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        //Verificar se esta preenchido
            if(!empty($email) && !empty($senha)){
            //  $u->conectar("epiz_24468694_projeto_login","sql101.epizy.com","epiz_24468694","iJMh79rcSR3XQD");  //Para o host
                $u->conectar("scala","localhost","root","");  //Para a máquina
                if($u->msgErro == ""){
                    if($u->logar($email, $senha)){
                        Header("Location: index.php");
                    } else{
                        ?>
                        <div class="msg-erro">
                            Email e/ou senha estão incorretos!
                        </div>
                        <?php
                    }
                } else{
                    ?>
                    <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro;?>
                    </div>
                    <?php
                }
            } else{
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>

            <?php

            }
    }
    

?>
</body>    
</html>