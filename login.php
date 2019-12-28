<?php
require_once 'class/usuarios.php';
$u = new Usuario("scala","localhost","root","");

if (isset($_SESSION["id_usuario"])){
	Header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScalAdv</title>
    <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon">
    <!--Google Fontes-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Alterar a folha de estilo entre Claro e Escuro -->
    <link id="tema" rel="stylesheet" href="css/light.css">
    <!-- Esilo Personalizado CSS -->
    <link rel="stylesheet" href="css/costume.css">
    </head>
<body>
<header>
    <br>

    <nav class="white z-depth-0">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo blue-text text-darken-2"><i class="material-icons">home</i>ScalAdv</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger blue-text text-darken-2"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="pregacao.php" class="blue-text text-darken-2">Pregação</a></li>
                    <li><a href="adoracao.php" class="blue-text text-darken-2">Adoração</a></li>
                    <li><a href="#!" class="blue-text text-darken-2" onclick="mudarTema()">
                        <i class="material-icons blue-text text-darken-2">brightness_4</i>
                        </a></li>
                        
                    <li><a href="login.php" class="blue-text text-darken-2"><strong>Usuário</strong></a></li>
                    
                    <li>
                                <a href="login.php"><img src="image/user.jpg"alt="" class="circle responsive-img tiny" style="width: 50px;"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <ul class="sidenav white" id="mobile-demo"><br>

                <div>
                    <div class="row center-align">
                        <div class=" col s7">

                        <li><a href="login.php"><img src="image/user.jpg"alt="" class="circle responsive-img"></a></li>
                        <br><br>

                    <li><a href="login.php" class="blue-text text-darken-2"><strong>Usuário</strong></a></li>
                        </div>
                    </div>
                </div>

            <li><a href="pregacao.php" class="blue-text text-darken-2">Pregação</a></li>
            <li><a href="adoracao.php" class="blue-text text-darken-2">Adoração</a></li>
            <li><a href="#!" class="blue-text text-darken-2" onclick="mudarTema()">Tema
                <i class="material-icons blue-text text-darken-2">brightness_4</i>
                </a></li>

        </ul>
    </header>



    <div class="container center-align">
        <div id="corpo-form">
            <h2 class="blue-text">Entrar</h2>
            <form method="POST">
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix">local_post_office</i>
                    <input id="icon_prefix"  type="email" class="validate" name="email" maxlength="30">
                    <label for="icon_prefix">E-mail</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_prefix"  type="password" class="validate" name="senha" maxlength="15">
                    <label for="icon_prefix">Senha</label>
                </div><br>

                <!--    <input type="submit" value="Cadastrar"> -->
                <button class="btn waves-effect waves-light" type="submit" value="Acessar" name="action">Entrar
                <i class="material-icons right">send</i>
                </button><br><br>


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
    <!-- Materialize JQuery -->
    <script src="js/jquery-3.4.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Scrip costumizado -->
    <script src="js/main.js"></script>

</body>
</html>