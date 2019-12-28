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
        <title>Sign up</title>    
        <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/login.css">
    </head>
<body>
    <div id="corpo-form">
        <h1>Cadastrar</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Primeiro nome" maxlength="30">
            <input type="email" name="email" placeholder="E-mail" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confirmSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="file" name="imagem">
            <input type="submit" value="Cadastrar">
            <a href="login.php">Já é inscrito? <strong>Acesse!</strong></a>
        </form>
    </div>
<?php
    //clicou no botão
    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmSenha = addslashes($_POST['confirmSenha']);
        $imagem = ($_FILES['imagem']);
        
            $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
            $novo_nome = md5($_FILES['imagem']['name'].rand(1,999)).$extensao;
            $diretorio = "image/";

            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);


            

        //Verificar se esta preenchido
        if(!empty($nome)&& !empty($email)&& !empty($senha)&& !empty($confirmSenha)&& !empty($imagem)){
        //  $u->conectar("epiz_24468694_projeto_login","sql101.epizy.com","epiz_24468694","iJMh79rcSR3XQD"); //Para uso na núvem
            $u->conectar("scala","localhost","root","");  //Para uso na máquina
                if($u->msgErro == ""){ //Se esta tudo ok
                    if($senha == $confirmSenha){
                        if($u->cadastrar($nome, $email, $senha, $novo_nome)){
                            ?>
                            <div id="msg-sucesso">
                                Cadastrado com sucesso! Acesse para entar!
                            </div>
                            <?php
                                $u->logar($email, $senha);
                                Header("Location: index.php");

                            //Se o usuário se cadastrar com sucesso ele dever entrar no jogo imediatamente    
                            Header("Location: index.php");


                        }
                         else{
                            ?>
                            <div class="msg-erro">
                                Email já cadastrado!
                            </div>
                            <?php
                        }
                    } else{
                        ?>
                        <div class="msg-erro">
                            Os campos SENHA e CONFIRMAR SENHA não correspondem!
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