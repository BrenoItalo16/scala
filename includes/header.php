<?php
session_start();
if (!isset($_SESSION["tema"])){
	$_SESSION['tema'] = "css/estilo.css";
}
?>

<?php

        if(isset($_SESSION['id_usuario'])){
            require_once 'class/usuarios.php';
            $u = new Usuario("scala","localhost","root","");
        
            $imag = $u->buscarDados($_SESSION['id_usuario']);
            $img = $imag["imagem"];    
        }else{
            $img = "user.jpg";
}


/*
?><pre><?php
var_dump($img);
?></pre><?php
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScalAdv</title>
    <link rel="shortcut icon" href="+image/logo.ico" type="image/x-icon">
    <!--Google Fontes-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" href="css/light.css">
    <!-- Esilo Personalizado CSS -->
    <link rel="stylesheet" href="css/costume.css">

    <!-- Alterar a folha de estilo entre Claro e Escuro -->
	<link id="tema" rel="stylesheet" href="<?=$_SESSION['tema']?>">
    

</head>
<body class="white">
<header>
    <br>

    <nav class="white z-depth-0">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo blue-text text-darken-2"><i class="material-icons">home</i>ScalAdv</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger blue-text text-darken-2"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#!" class="blue-text text-darken-2">Louvores Iniciais</a></li>
                    <li><a href="#!" class="blue-text text-darken-2">Louvores Principais</a></li>
                    <li><a href="#!" class="blue-text text-darken-2" onclick="mudarTema()">
                        <i class="material-icons blue-text text-darken-2">brightness_4</i>
                        </a></li>

                    <li><a href="login.php" class="blue-text text-darken-2"><strong>Usuário</strong></a></li>
                    
                    <div>
                        <div class="row">
                            <div class=" col s2">
                                <li><a href="login.php"><img src="image/<?php echo $img;?>"alt="" class="circle responsive-img"></a></li>
                            </div>
                        </div>
                    </div>
                    
                </ul>
            </div>
        </div>
    </nav>

        <ul class="sidenav white" id="mobile-demo"><br>

                <div>
                    <div class="row center-align">
                        <div class=" col s7">



                        <li><a href="login.php"><img src="image/<?php echo $img;?>"alt="" class="circle responsive-img"></a></li>
                        <br><br>

                            <a href="login.php" class="blue-text text-darken-2">Usuário</a>
                        </div>
                    </div>
                </div>

                
            <li><a href="#!" class="blue-text text-darken-2">Louvores Iniciais</a></li>
            <li><a href="#!" class="blue-text text-darken-2">Louvores Principais</a></li>
            <li><a href="#!" class="blue-text text-darken-2" onclick="mudarTema()">Tema escuro
                <i class="material-icons blue-text text-darken-2">brightness_4</i>
                </a></li>

        </ul>

    </header>