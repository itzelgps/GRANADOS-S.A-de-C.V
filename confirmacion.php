<?php
error_reporting (0);
require ('conexion.php');


$codigo_activacion_usuario= $_POST['codigo_confirmacion'];
$correo = $_POST['correo'];

$consulta= "SELECT * FROM users WHERE correo='$correo' AND codigo_activacion='$codigo_activacion_usuario'";

$resultado= mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas){

$sql= "UPDATE users SET estado = 1 WHERE correo='$correo'";
$res= mysqli_query($conexion,$sql);

header("Location:errores/activacion_correcta.php");
    
}



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link rel="stylesheet" href="fuentes/fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" href="materialize/css/registro.css">
    <link rel="shortcut icon" href="imagenes/ICONO.png" type="image/x-icon">

    <title>Inicio</title>
    
</head>
<body>
<div class="row" >
                              
                              <nav class="amber darken-4 hide-on-med-and-down">
                                          <div class="nav-wrapper">
                                          
                                                  <a href="#" class="brand-logo"> Granados</a>
                                                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                                                          
                                                          
                                                          <?php if( $varsesion == null || $varsesion=='' ): ?> 
                                                              <li> <a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                                                              <li><a href="distribuidores.php"><i class="fas fa-truck"></i> Distribuidores</a></li>
                                                              <li><a href="productos.php"> <i class="fas fa-store"></i> Productos</a></li>
                                                              <li><a href="pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos </a></li> 
                                                              <li><a href="contacto.php"><i class="fas fa-comments"></i> Contacto</a></li>        
                                                              <li><a href="iniciodesesion.php"><i class="fas fa-user"></i>  Iniciar Sesion </a></li>
                                                          <?php else: ?>
                                                              <li> <a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                                                              <li><a href="distribuidores.php"><i class="fas fa-truck"></i> Distribuidores</a></li>
                                                              <li><a href="productos.php"> <i class="fas fa-store"></i> Productos</a></li>
                                                              <li><a href="pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos </a></li> 
                                                              <li><a href="contacto.php"><i class="fas fa-comments"></i> Contacto</a></li>         
                                                              <li><a href="profile.php"><i class="fas fa-user"></i>  <?php echo $row['nombre'] ?> </a></li>
                                                              <li><a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li> 
                                                          <?php endif; ?>


                                                  </ul>
                                          </div>
                                          
                              </nav>
                              
                              <!-- ESPACIO DE TRABAJO   --> 

                              
                            <div class="row hide-on-large-only amber darken-4">
                              <div class="col s11">
                              <h3 style="display:block" class="hide-on-large-only center white-text">Granados</h3>
                              
                              </div>
                              <div class="col s1">
                              <a href="#" style="margin-bot:50px;" data-target="slide-out" class="sidenav-trigger red-text hide-on-large-only right"><h3 style="margin-right:25px;" class="white-text"><i class="fas fa-bars"></i></h3></a>
                              </div>
                            
                              
                            </div>
                             


                            <ul id="slide-out" class="sidenav">
                            <?php if( $varsesion == null || $varsesion=='' ): ?> 
                              <li> <a href="index.php"><h5> <i class="fas fa-home"></i> Inicio  </h5></a></li>
                              <li><a href="distribuidores.php"><h5> <i class="fas fa-truck"></i> Distribuidores  </h5></a></li>
                              <li><a href="productos.php"><h5>  <i class="fas fa-store"></i> Productos  </h5></a></li>
                              <li><a href="pedidos.php"><h5> <i class="fas fa-shopping-cart"></i> Pedidos   </h5></a></li> 
                              <li><a href="contacto.php"><h5> <i class="fas fa-comments"></i> Contacto  </h5></a></li>        
                              <li><a href="iniciodesesion.php"><h5><i class="fas fa-user"></i>  Iniciar Sesion</h5>   </h5></a></li>
                          <?php else: ?>
                              <li> <a href="index.php"><h5> <i class="fas fa-home"></i> Inicio  </h5></a></li>
                              <li><a href="distribuidores.php"><i class="fas fa-truck"></i> Distribuidores  </h5></a></li>
                              <li><a href="productos.php"> <h5> <i class="fas fa-store"></i> Productos  </h5></a></li>
                              <li><a href="pedidos.php"><h5> <i class="fas fa-shopping-cart"></i> Pedidos   </h5></a></li> 
                              <li><a href="contacto.php"><h5> <i class="fas fa-comments"></i> Contacto  </h5></a></li>         
                              <li><a href="profile.php"><h5> <i class="fas fa-user"></i>  <?php echo $row['nombre'] ?>   </h5></a></li>
                              <li><a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li> 
                          <?php endif; ?>
                            </ul>

                            
                                  
</div>
 


    <div class="row orange" style="padding-bottom:600px;">
            <div id="uno" class="col s10 offset-s1">
                        <div id="total" class="row">
                                                    <div id="izquierda" class="col s12 l6 offset-l3">
                                                            <h3 class="orange-text center">Confirme su correo</h3>
                                                                                <h3 class="orange-text center"><?php if(!($filas) && (isset($_POST['correo']))) {
                                                                                    echo "Error en la activación";
                                                                                }   ?></h3>
                                                                                <form action="confirmacion.php" method="POST">
                                                                                    <br><br>
                                                                                        <p style="text-align: center; color: orange" >Correo electrónico:<input style="border-radius: 34px 34px 34px 34px;
                                                                                            -moz-border-radius: 34px 34px 34px 34px;
                                                                                            -webkit-border-radius: 34px 34px 34px 34px;
                                                                                            border: 0px solid #000000; text-align: center;" class="white black-text" type="text" name="correo" size="40" required placeholder="Cuenta de correo"></p>
                                                                                        <p style="text-align: center; color: orange;">
                                                                                        Código de confirmación:<input style="border-radius: 34px 34px 34px 34px;
                                                                                            -moz-border-radius: 34px 34px 34px 34px;
                                                                                            -webkit-border-radius: 34px 34px 34px 34px;
                                                                                            border: 0px solid #000000; text-align: center; " class="white orange-text;" type="text" name="codigo_confirmacion" size="40" required placeholder="Codigo de confirmacion"></p>
                                                                                      
                                                                                      
                                                                                      
                                                                                        <p class="center">
                                                                                            <input style="border-radius: 34px 34px 34px 34px;
                                                                                            -moz-border-radius: 34px 34px 34px 34px;
                                                                                            -webkit-border-radius: 34px 34px 34px 34px;
                                                                                            border: 0px solid #000000; text-align: center;" class="btn orange" type="submit" value="Confirmar">
                                                                                            
                                                                                        </p>
                                                                                       
                                                                                        
                                                                                        
                                                                
                                                                                      
                                                                                    </form>
                                                            
                                                      
                                                    </div>

                                                    
                               
                        </div>
            </div>
            
    </div>

    <div class="row">
        
            <footer class="page-footer amber darken-4">
                   <div class="row">
                        <div class="col s12"><p> © 2019 Granados S.A. de C.V. <span><a class="white-text right" href="ayuda.php">Ayuda <i class="fas fa-question-circle"></i></a></span></p>
                      </div>
                   </div>
                  </footer>
    </div>


<script>
      M.AutoInit();
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems,);
  });
</script>

<script src="materialize/js/materialize.min.js"></script>
<script src="fuentes/fontawesome-free-5.9.0-web/js/all.js"></script>
</body>
</html>


