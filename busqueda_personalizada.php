<?php

session_start();                                 // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

$varsesion= $_SESSION['usuario'];                // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
error_reporting(0);
if( $varsesion==null || $varsesion= '' ) {       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    header("Location:iniciodesesion.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    die();                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
}                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
$varsesion= $_SESSION['usuario'];
require ('conexion.php');
$consulta= "SELECT * FROM users WHERE id='$varsesion'";
$resultado= mysqli_query($conexion,$consulta);
$row= $resultado -> fetch_assoc();

$fecha_per=$_POST['fecha_per'];
$ref_per=$_POST['ref_per'];


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
        
        <div class="col s10 offset-s1 white-text center"> <h3 class="orange accent-4">Búsqueda personalizada</h3> 
        <div class="row">



             <div class="col s6 offset-s1">
                 <h5 class="orange-text">Buscar codigo de referencia: </h5>
                    <div class="row">
                        
                        <form action="busqueda_personalizada.php" method="POST">
                             <input name="ref_per" class="center" placeholder="Codigo de referencia" type="text">
                             <button type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                        </form>

                    </div>
            </div>

            <div class="col s4 offset-s1 orange-text">
            <h5 class="orange-text">Buscar por fecha: </h5>
                    <div class="row">
                        
                        <form action="busqueda_personalizada.php" method="POST">
                             <input name="fecha_per" placeholder="Fecha" type="text" class="datepicker">
                             <button type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                        </form>

                    </div>
            </div>
            <div class="col s12">
                <a class="btn orange" href="profile.php">Volver </a>
            </div>



        </div>
        </div>
        
        

        <div class="col s12 m8 offset-m2 center"> 
                
                   
                        
                                <?php 

                                $id=$row['id'];
                                
                                require ('conexion.php');
                                $sql= "SELECT * FROM compras WHERE id_user='$id'";
                                $hay= mysqli_query($conexion,$consulta);
                                $si= $hay -> fetch_assoc();



                                if($si){ 

                                    $especial= "SELECT * FROM compras WHERE id_user='$id'";
                                    $esp= mysqli_query($conexion,$especial);
                                    $fet= $esp -> fetch_assoc();

                                    //sadsadsadas
                                    
                                    $sql= "SELECT DISTINCT codigo_referencia FROM compras WHERE id_user='$id' and codigo_referencia='$ref_per' OR id_user='$id' and fecha='$fecha_per' ORDER BY codigo_referencia DESC";
                                    $resu= $conexion -> query($sql);
                                    
                                    $cont=1;
                                   
                                    while ($fs=$resu->fetch_assoc()){
                                        ?>
                                        <table class="responsive-table">
                                        <thead>
                                            <td bgcolor="#ff6f00" class="center white-text" colspan="9"><b>Compra</b></td>
                                            
                                        </thead>
                                        <?php
                                        
                                        $ref=$fs['codigo_referencia'];
                                        $nuevo= "SELECT * FROM compras where id_user='$id' and codigo_referencia='$ref'";
                                        $tabla= $conexion -> query($nuevo);
                                        ?>
                                        <tbody>
                                        <tr bgcolor="#ffe082" style="border-bottom: 2px solid;">
                                        <td><b>Cod. Ref.</b></td>
                                        <td><b>Fecha</b></td>
                                        <td><b>Nombre</b></td>
                                        <td><b>Apellido paterno</b></td>
                                        <td><b>Apellido materno</b></td>
                                        <td><b>Producto</b></td>
                                        <td><b>Cantidad</b></td>
                                        <td><b>Precio /kg</b></td>
                                        <td><b>Subtotal</b></td>
                                        </tr>
                                        <?php
                                        $totalidad=0;
                                        while($da=$tabla->fetch_assoc()){ 
                                        ?>
                                        
                                                    <tr bgcolor="#ffe082" style="border-bottom: none;">

                                                    <td><?php echo $da['codigo_referencia'] ?> </td>
                                                    <td><?php echo $da['fecha'] ?> </td>
                                                    <td><?php echo $da['nombre_user'] ?> </td>
                                                    <td><?php echo $da['ap_paterno'] ?> </td>
                                                    <td><?php echo $da['ap_materno'] ?> </td>
                                                    <td><?php echo $da['nombre_producto'] ?> </td>
                                                    <td><?php echo $da['cantidad_comprada'] ?> </td>
                                                    <td><?php echo $da['precio'] ?> </td>
                                                    <?php $totalidad+=$da['total'] ?>
                                                    <?php $infodecompra=$da['codigo_referencia'] ?>
                                                    <td><?php echo $da['total'] ?> </td>
                                                    
                                                    
                                                    </tr>
                                                   
                                                    

                                    <?php  
                                        }
                                    ?>
                                     <tr bgcolor="#ffe082" style="border-bottom: none;">
                                            <td colspan="7" class="green-text"><span class="right"><button value="<?php echo $infodecompra;?>" form="form_prueba" type="submit" name="infodecompra" class="btn grey">Imprimir Recibo</button> </span></td>
                                            <td colspan="2" class="green-text"><span class="right"><b><?php echo "Total: ".$totalidad; ?></b> </span></td> 
                                    </tr>
                                        <form target="_blank" id="form_prueba" action="impresion/index.php" method="POST">
                                    
                                        </form>

                                    </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <?php
                                    }
                                    
                                    //asdasdas

                                    
                                
                                
                                
                                } else {
                                        
                                        ?>
                                        <table>
                                            <tbody>
                                                <tr>
                                                     <td COLSPAN="5" class="center" ><h3 class="orange-text">No hay resultados que mostrar</h3> </td>

                                                    
                                                 </tr>
                                                 <br>
                                                 <br>
                                            </tbody>
                                        </table>
                                        <?php  
                                    }
                                ?>

                

    </div>
        
    </div>

    

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {
        format:'yyyy-mm-dd'
    });
  });
</script>



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