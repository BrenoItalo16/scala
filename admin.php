<?php require_once 'class/conectar.php'; ?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>ScalAdv</title>
      <link rel="shortcut icon" href="image/adv-Icon.ico" type="image/x-icon">
      <!--Google Fontes-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Esilo Personalizado CSS -->
      <link rel="stylesheet" href="css/costume.css">
      <link rel="stylesheet" href="css/admin.css">
    </head>

    <body class="grey darken-4">
    <header>
        <nav class="grey darken-3 z-depth-1">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo grey-text text-lighten-1"><i class="material-icons">build</i>Admin</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger grey-text text-lighten-1"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="mar.php" class="grey-text text-lighten-1">Escala</a></li>
                        <?php
                            if (isset($_SESSION["id_usuario"])){
                                echo('<li><a href="sair.php" class="grey-text text-lighten-1">Sair</a></li>');
                            }
                        ?>

                        <li><a href="<?php
                            if (isset($_SESSION["id_usuario"])){
                                echo("index.php");
                            }else{
                                echo "login.php";
                            }
                        ?>" class="grey-text text-lighten-5"><strong><?php echo $priNome ?></strong></a></li>
                        
                        <li>
                          <a href="login.php"><img src="image/<?php echo $img;?>"alt="usuario"
                          class="circle responsive-img" style="width: 50px;
                                                              margin-top:7px;"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <ul class="sidenav grey darken-4" id="mobile-demo"><br>

                <div>
                    <div class="row center-align">
                        <div class=" col s7">



                        <li><a href="login.php"><img src="image/<?php echo $img;?>"alt="" class="circle responsive-img"></a></li>
                        <br><br>



                    <li><a href="<?php
                        if (isset($_SESSION["id_usuario"])){
                            echo("index.php");
                        }else{
                            echo "login.php";
                        }
                    ?>" class="grey-text text-lighten-5"><strong><?php echo $nome ?></strong></a></li>
                        </div>
                    </div>
                </div>

                
            <li><a href="mar.php" class="grey-text text-lighten-1">Escala</a></li>
            
            <?php
                if (isset($_SESSION["id_usuario"])){
                    echo('<li><a href="sair.php" class="grey-text text-lighten-1">Sair</a></li>');
                }
            ?>
        </ul>

    </header>

<?php
  #Dados das pessoas
  require_once 'class/pessoas.php';
  $p = new Pessoa("scala","localhost","root","");
  $pessoas = $p->buscarDados();
    
  #Dados dos anos
  require_once 'class/anos.php';
  $a = new Ano("scala","localhost","root","");
  $anos = $a->buscarDados();

  #Dados dos meses
  require_once 'class/meses.php';
  $m = new Mes("scala","localhost","root","");
  $meses = $m->buscarDados();

  #Dados dos dias
  require_once 'class/dias.php';
  $d = new Dia("scala","localhost","root","");
  $dias = $d->buscarDados();
?>

    <main class="z-depth-0">
      <div class="container z-depth-0">
          <nav class="z-depth-0">
            <div class="center grey darken-4">
              <div>
                <h5 class="grey-text text-lighten-1" style="margin-bottom:20px">Escolha um dia</h5>
              </div>
              
            <!--Selects-->            
            <div class="row"> 
            <div class="col l3 m2"></div>
            <div class="col l6 m8 s12">
              <div class="col l4 n4 s4">
                  <select class="browser-default">
                      <option value="" disabled selected>Ano</option>
                        <?php 
                          foreach ($anos as $ano) {
                            echo'<option value="'.(array_unique($ano)["id_ano"]).'">'.(array_unique($ano)["id_ano"]).'</option>';
                          }
                        ?>
                  </select>
              </div>
              <div class="col l4 n4 s4">
                  <select class="browser-default">
                      <option value="" disabled selected>Mês</option>
                        <?php 
                          foreach ($meses as $mes) {
                            echo'<option style="text-transform: capitalize" value="'.(array_unique($mes)["id_mes"]).'">'.(array_unique($mes)["nome_mes"]).'</option>';
                          }
                        ?>
                  </select>
              </div>
              <div class="col l4 n4 s4">
                  <select class="browser-default">
                      <option value="" disabled selected>Dia</option>
                        <?php 
                          foreach ($dias as $dia) {
                            echo'<option value="'.(array_unique($dia)["id_dia"]).'">'.(array_unique($dia)["id_dia"]).'</option>';
                          }
                        ?>
                  </select>
              </div>
            </div>
            <div class="col l3 m2"></div>
            </div>

            <!--Área de ajax-->
              <div class="row"> 
              <div class="col l3 m2"></div>
              <div class="col l6 m8 s12">
                <div class="col l12 n12 s12">
                    <label>Escala do dia</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Pregador</option>
                        <?php 
                          foreach ($pessoas as &$pessoa) {
                            echo'<option value="'.(array_unique($pessoa)["id_user"]).'">'.(array_unique($pessoa)["nome"]).'</option>';
                          }
                        ?>
                    </select>
                </div>
              </div>
              <div class="col l3 m2"></div>
              </div>
              
              <div class="row"> 
              <div class="col l3 m2"></div>
              <div class="col l6 m8 s12">
                <div class="col l6 m6 s6">
                    <select class="browser-default">
                        <option value="" disabled selected>Inicial 1</option>
                        <?php 
                          foreach ($pessoas as &$pessoa) {
                            echo'<option value="'.(array_unique($pessoa)["id_user"]).'">'.(array_unique($pessoa)["nome"]).'</option>';
                          }
                        ?>
                    </select>
                </div>
                <div class="col l6 m6 s6">
                    <select class="browser-default">
                        <option value="" disabled selected>Inicial 2</option>
                        <?php 
                          foreach ($pessoas as &$pessoa) {
                            echo'<option value="'.(array_unique($pessoa)["id_user"]).'">'.(array_unique($pessoa)["nome"]).'</option>';
                          }
                        ?>
                    </select>
                </div>
              </div>
              <div class="col l3 m2"></div>
              </div>
              
              <div class="row"> 
              <div class="col l3 m2"></div>
              <div class="col l6 m8 s12">
                <div class="col l6 m6 s6">
                    <select class="browser-default">
                        <option value="" disabled selected>Especial 1</option>
                        <?php 
                          foreach ($pessoas as &$pessoa) {
                            echo'<option value="'.(array_unique($pessoa)["id_user"]).'">'.(array_unique($pessoa)["nome"]).'</option>';
                          }
                        ?>
                    </select>
                </div>
                <div class="col l6 m6 s6">
                    <select class="browser-default">
                        <option value="" disabled selected>Especial 2</option>
                        <?php 
                          foreach ($pessoas as &$pessoa) {
                            echo'<option value="'.(array_unique($pessoa)["id_user"]).'">'.(array_unique($pessoa)["nome"]).'</option>';
                          }
                        ?>
                    </select>
                </div>
              </div>
              <div class="col l3 m2"></div>
              </div>

            </div>
          </nav>
          



      </div>
    </main>
        <footer class="page-footer deep-purple">          
          <div class="footer-copyright">
            <div class="container">
            © 2020 Breno Italo
            <a class="grey-text text-lighten-4 right" href="https://github.com/BrenoItalo16">brenoitalo.com</a>
            </div>
          </div>
        </footer>

        <!-- Materialize JQuery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- Materialize JQuery -->
        <script src="js/materialize.js"></script>
        <!-- Scrip costumizado -->
        <script src="js/main.js"></script>
    </body>
  </html>