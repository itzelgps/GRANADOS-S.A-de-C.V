<?php
error_reporting(0);
session_start();                                 // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
$varsesion= $_SESSION['usuario'];                // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

if( $varsesion==null || $varsesion= '' ) {       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    header("Location:iniciodesesion.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    die();                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
}      

// ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
$varsesion= $_SESSION['usuario'];
require ('conexion.php');
$consulta= "SELECT * FROM users WHERE id='$varsesion'";
$resultado= mysqli_query($conexion,$consulta);

$row= $resultado -> fetch_assoc();

if($row['tipo_usuario']!='admin'){
    header("Location:profile.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    die();
}

$sql="SELECT * from compras WHERE nombre_user='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND fecha='$fecha_per'";
$otro= "SELECT DISTINCT codigo_referencia FROM compras WHERE nombre_user='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND fecha='$fecha_per' ORDER BY codigo_referencia DESC";

if (isset($_POST['nombrefecha'])){
    $nombre_per=$_POST['nombre_per'];
    $paterno_per=$_POST['paterno_per'];
    $materno_per=$_POST['materno_per'];
    $fecha_per=$_POST['fecha_per'];

    $sql="SELECT * from compras WHERE nombre_user='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND fecha='$fecha_per'";
    $otro= "SELECT DISTINCT codigo_referencia FROM compras WHERE nombre_user='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND fecha='$fecha_per' ORDER BY codigo_referencia DESC";
} 
if (isset($_POST['nombrecodigo'])){
    $nombre_per=$_POST['nombre_per'];
    $paterno_per=$_POST['paterno_per'];
    $materno_per=$_POST['materno_per'];
    $codigo_per=$_POST['ref_per'];

    $sql="SELECT * from compras WHERE nombre_user='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND codigo_referencia='$codigo_per'";
    $otro= "SELECT DISTINCT codigo_referencia FROM compras WHERE nombre_user='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND codigo_referencia='$codigo_per' ORDER BY codigo_referencia DESC";
}
if (isset($_POST['codigofecha'])){
    $ref_per=$_POST['ref_per'];
    $fecha_per=$_POST['fecha_per'];

    $sql="SELECT * from compras WHERE codigo_referencia='$ref_per' AND fecha='$fecha_per'";
    $otro= "SELECT DISTINCT codigo_referencia FROM compras WHERE codigo_referencia='$ref_per' AND fecha='$fecha_per'";
}
if (isset($_POST['codigocodigo'])){
    $ref_per=$_POST['ref_per'];

    $sql="SELECT * from compras WHERE codigo_referencia='$ref_per'";
    $otro= "SELECT DISTINCT codigo_referencia FROM compras WHERE codigo_referencia='$ref_per'";
}
if (isset($_POST['fechafecha'])){

    $fecha_per=$_POST['fecha_per'];

    $sql="SELECT * from compras WHERE fecha='$fecha_per'";
    $otro= "SELECT DISTINCT codigo_referencia FROM compras WHERE fecha='$fecha_per'";
}
$tabla='compras';
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
        <div class="col s12 m8 offset-m2">
        <form id="mi_formulario" action="busqueda_administrador_ventas.php" method="POST"></form>
                        <div class="col s12  center">
                        <a style='margin:10px' class='btn btn-large orange' href='administracion.php'><i style='font-size:20px' class='fas fa-cogs'></i> Panel de administración</a>
                                <h3 class="orange-text">Seleccione el tipo de filtro para las ventas</h3>

                                <ul class="collapsible">
                                        <li>
                                            
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por nombre y fecha</b></div>
                                            <div class="collapsible-body">
                                            <form class="center" action="busqueda_administrador_ventas.php" method="POST">
                                            <p class="center"><b>Nombre</b></p>
                                        <input name="nombre_per" class="center" placeholder="Nombre" type="text">
                                        <p class="center"><b>Apellido paterno</b></p>
                                        <input name="paterno_per" class="center" placeholder="Apellido paterno" type="text">
                                        <p class="center"><b>Apellido materno</b></p>
                                        <input name="materno_per" class="center" placeholder="Apellido materno" type="text">
                                            <p class="center"><b>Fecha:</b></p>
                                        <input name="fecha_per" placeholder="Fecha" type="text" class="datepicker center">
                                        <button name="nombrefecha" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                     </form>
                                            
                                            </div>
                                        </li>
                                </ul>

                                <ul class="collapsible">
                                        <li>
                                            
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por nombre y Codigo de referencia</b></div>
                                            <div class="collapsible-body">
                                            <form class="center" action="busqueda_administrador_ventas.php" method="POST">
                                            <p class="center"><b>Nombre</b></p>
                                        <input name="nombre_per" class="center" placeholder="Nombre" type="text">
                                        <p class="center"><b>Apellido paterno</b></p>
                                        <input name="paterno_per" class="center" placeholder="Ap paterno" type="text">
                                        <p class="center"><b>Apellido materno</b></p>
                                        <input name="materno_per" class="center" placeholder="Ap materno" type="text">
                                        <p class="center"><b>Codigo de referencia</b></p>
                                        <input name="ref_per" class="center" placeholder="Codigo" type="text">
                                            
                                        <button name="nombrecodigo" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                     </form>
                                            
                                            </div>
                                        </li>
                                </ul>

                                <ul class="collapsible">
                                            <li>
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Codigo y Fecha</b></div>
                                            <div class="collapsible-body">
                                                
                                            <form class="center" action="busqueda_administrador_ventas.php" method="POST">
                                                        <p class="center"><b>Codigo</b></p>
                                                    <input name="ref_per" class="center" placeholder="Codigo" type="text">
                                                        <p class="center"><b>Fecha:</b></p>
                                                    <input name="fecha_per" placeholder="Fecha" type="text" class="datepicker center">
                                                    <button name="codigofecha" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                            </form></div>

                                            </li>
                                </ul>

                                <ul class="collapsible">
                                            <li>
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por codigo </b></div>
                                            <div class="collapsible-body">
                                                
                                            <form class="center" action="busqueda_administrador_ventas.php" method="POST">
                                                        <p class="center"><b>Codigo</b></p>
                                                    <input name="ref_per" class="center" placeholder="Codigo" type="text">
                                                    <button name="codigocodigo" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                            </form>
                                            
                                            </li>
                                </ul>

                                <ul class="collapsible">
                                            <li>
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Fecha </b></div>
                                            <div class="collapsible-body">
                                                
                                              <form class="center" action="busqueda_administrador_ventas.php" method="POST">
                                                        
                                                        <p class="center"><b>Fecha:</b></p>
                                                    <input name="fecha_per" placeholder="Fecha" type="text" class="datepicker center">
                                                    <button name="fechafecha" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                              </form>
                                            
                                            </li>
                                </ul>

                               
                        
        </div>
    </div> 


    <div class="row">
        <div class="col s12 m6 offset-m3">
            <?php

            
            ?>


        </div>
    </div>
    
    

    <div class="row">
            <div class="col s12 m8 offset-m2 center"> 
                    <table>

                    <thead>
                    
                   

                    
                    </thead>
                    <tbody>
                     <?php 

                        


                        $ejecucion= mysqli_query($conexion,$sql);
                        
                        if ( $fila= $ejecucion -> fetch_array()){
                            
                            
                            
                            
                            $resu= $conexion -> query($otro);
                            
                            while ($fs=$resu->fetch_assoc()){
                                
                                ?>
                                <table class="responsive-table">
                                <thead>
                                    <td bgcolor="#ff6f00" class="center white-text" colspan="9"><b>Compra</b></td>
                                    
                                </thead>
                                <?php
                                
                                $ref=$fs['codigo_referencia'];
                                $nuevo= "SELECT * FROM compras where codigo_referencia='$ref'";
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
                                            <td><?php echo "$".$da['total'] ?> </td>
                                            
                                            
                                            </tr>
                                           
                                            

                            <?php  
                                }
                            ?>
                             <tr bgcolor="#ffe082" style="border-bottom: none;">
                                    <td colspan="7" class="green-text"><span class="right"><button  value="<?php echo $infodecompra;?>" form="form_prueba" type="submit" name="infodecompra" class="btn grey">Imprimir reporte de venta</button> </span></td>
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
                        } else {
                            echo " <h3 class='orange-text'>No hay resultados para esta búsqueda</h3> ";
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
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems,);
  });
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {
        format:'yyyy-mm-dd'
    });
  });
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems,);
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