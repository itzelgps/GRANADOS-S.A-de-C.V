<?php
session_start();                                 // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
error_reporting(0);
$varsesion= $_SESSION['usuario'];                // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

                                     // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE                              // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

$varsesion= $_SESSION['usuario'];
include ('../conexion.php');


$consulta= "SELECT * FROM users WHERE id='$varsesion'";
$resultado= mysqli_query($conexion,$consulta);
$row= $resultado -> fetch_assoc();

if( !($varsesion==null) || !($varsesion== '') ) {       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    header("Location:../profile.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
                                           // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../fuentes/fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" href="../materialize/css/registro.css">
    <link rel="shortcut icon" href="../imagenes/ICONO.png" type="image/x-icon">

    <title>Inicio</title>
    
</head>
<body>
<div class="row">
                              
                              <nav class="amber darken-4 hide-on-med-and-down">
                                          <div class="nav-wrapper">
                                          
                                                  <a href="#" class="brand-logo"> Granados</a>
                                                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                                                          
                                                          
                                                          <?php if( $varsesion == null || $varsesion=='' ): ?> 
                                                              <li> <a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
                                                              <li><a href="../distribuidores.php"><i class="fas fa-truck"></i> Distribuidores</a></li>
                                                              <li><a href="../productos.php"> <i class="fas fa-store"></i> Productos</a></li>
                                                              <li><a href="../pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos </a></li> 
                                                              <li><a href="../contacto.php"><i class="fas fa-comments"></i> Contacto</a></li>        
                                                              <li><a href="../iniciodesesion.php"><i class="fas fa-user"></i>  Iniciar Sesion </a></li>
                                                          <?php else: ?>
                                                              <li> <a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
                                                              <li><a href="../distribuidores.php"><i class="fas fa-truck"></i> Distribuidores</a></li>
                                                              <li><a href="../productos.php"> <i class="fas fa-store"></i> Productos</a></li>
                                                              <li><a href="../pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos </a></li> 
                                                              <li><a href="../contacto.php"><i class="fas fa-comments"></i> Contacto</a></li>         
                                                              <li><a href="../profile.php"><i class="fas fa-user"></i>  <?php echo $row['nombre'] ?> </a></li>
                                                              <li><a href="../logout.php"> <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>  
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
                              <li> <a href="../index.php"><h5> <i class="fas fa-home"></i> Inicio  </h5></a></li>
                              <li><a href="../distribuidores.php"><h5> <i class="fas fa-truck"></i> Distribuidores  </h5></a></li>
                              <li><a href="../productos.php"><h5>  <i class="fas fa-store"></i> Productos  </h5></a></li>
                              <li><a href="../pedidos.php"><h5> <i class="fas fa-shopping-cart"></i> Pedidos   </h5></a></li> 
                              <li><a href="../contacto.php"><h5> <i class="fas fa-comments"></i> Contacto  </h5></a></li>        
                              <li><a href="../iniciodesesion.php"><h5><i class="fas fa-user"></i>  Iniciar Sesion</h5>   </h5></a></li>
                          <?php else: ?>
                              <li> <a href="../index.php"><h5> <i class="fas fa-home"></i> Inicio  </h5></a></li>
                              <li><a href="../distribuidores.php"><i class="fas fa-truck"></i> Distribuidores  </h5></a></li>
                              <li><a href="../productos.php"> <h5> <i class="fas fa-store"></i> Productos  </h5></a></li>
                              <li><a href="../pedidos.php"><h5> <i class="fas fa-shopping-cart"></i> Pedidos   </h5></a></li> 
                              <li><a href="../contacto.php"><h5> <i class="fas fa-comments"></i> Contacto  </h5></a></li>         
                              <li><a href="../profile.php"><h5> <i class="fas fa-user"></i>  <?php echo $row['nombre'] ?>   </h5></a></li>
                              <li><a href="../logout.php"> <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>  
                          <?php endif; ?>
                            </ul>

                            
                                  
                  
    </div>
        <div class="row">
            <div class="col s8 m6 offset-s2 offset-m4 ">
                    <div class="col s12 m7" >
                            <h2 class="header orange-text center">Error al registrar su cuenta</h2>
                            <div class="card horizontal">
                            <div class="card-image">
                               
                            </div>
                            <div class="card-stacked">
                                <div class="card-content center">
                                <p>Las contraseñas en el formulario no coinciden </p>
                                </div>
                                <div class="card-action center">
                                <a href="../iniciodesesion.php">Volver a intentar</a>
                                </div>
                            </div>
                            </div>
                        </div>
            </div>
        </div>
                    

    <div style="margin-top:350px;" class="row">
            
                        <div class="col s12 amber darken-4"><p> © 2019 Granados S.A. de C.V.</p></div>
                   
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