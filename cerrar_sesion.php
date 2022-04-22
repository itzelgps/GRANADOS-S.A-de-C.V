<?php

session_start();                                 // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

$varsesion= $_SESSION['usuario'];                // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

if( $varsesion==null || $varsesion= '' ) {       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    header("Location:iniciodesesion.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    die();                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
}                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
require ("conexion.php");
$consulta= "SELECT * FROM productos";
$resultado= mysqli_query($conexion,$consulta);

$consulta= "SELECT * FROM productos";
$existencia= mysqli_query($conexion,$consulta);



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link rel="stylesheet" href="fuentes/fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" href="materialize/css/perfilusuario.css">
    <link rel="shortcut icon" href="imagenes/ICONO.png" type="image/x-icon">

    <title>Perfil de usuario</title>
    
</head>
<body>
<div class="row">
                              
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
    
    
    <div class="row">
        
        <div class="col s10 offset-s1 white-text center"> 
            <h3 class="orange accent-4">Desea cerrar</h3>  
        </div>
        
       

        <div class="col s8 offset-s2 center"> 
                <h3  >¡Bienvenido <?php echo $_SESSION['usuario'] ?>!</h3>
                <br>
                <h5>A continuación se muestran todas tus compras realizadas</h5>
                <br>
                <br>
                <h5>También puedes realizar una búsqueda personalizada</h5>
                    <a class="waves-effect orange btn-large">Busqueda personalizada</a>
                <br>
                <br>
                        <table class="highlight responsive-table">
                                <thead>
                                <tr>
                                    <h3 class="orange-text" >Compras</h3>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td><b>PRODUCTO</b> </td>
                                    <td><b>CANTIDAD ( en kg )</b></td>
                                    <td><b>PRECIO UNITARIO ( por kg )</b></td>
                                    <td><b>IVA 16%</b></td>
                                    <td><b>TOTAL</b></td>
                                </tr>
                                <?php 
                                if($existencia -> fetch_assoc()){ 
                                    while ($row=$resultado -> fetch_assoc()){
                                        ?>
                                <tr>
                                <td><?php echo $row['nombre'] ?> </td>
                                <td>CANTIDAD</b></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td>IVA</b></td>
                                <td><?php echo '$ '.$row['precio'].' MXN' ?></td>
                                </tr>
                                            




                                        <?php        
                                    }
                                
                                
                                
                                } else {
                                        
                                        ?>
                                                <tr>
                                                     <td COLSPAN="5" class="center" ><h3 class="orange-text">No hay compras registradas</h3> </td>

                              
                                                 </tr>
                                                 <br>
                                                 <br>
                                        <?php  
                                    }
                                ?>


                                </tbody>
                </table> 
    
                

        </div>
        
    </div>

    

    <br>
    <br>
    <br>
    <br>
    <br>
   
                                                   


    <div style="margin-bottom:0px !important;" class="row">
            <footer class="page-footer amber darken-4">
                   <div style="margin-bottom:0px !important;" class="row">
                       
                       <br>
                        <div class="col s12"><p> © 2019 Granados S.A. de C.V.</p></div>
                   </div>
                  </footer>
    </div>




<script>
      M.AutoInit();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{
        duration: 300,
        indicators:true,
        fullWidth: true
        

    });
  });
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