<?php

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


if(isset($_POST['tabla'])){
    $tabla=$_POST['tabla'];
} else{
    $tabla='compras';
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
           <nav class="amber darken-4 hide-on-med-and-down">
                <div class="nav-wrapper ">
                    
                    <a style="padding-left:10px;" href="#" class="brand-logo"> <i class="fas fa-cogs"></i> Panel de administracion:</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                
                      </ul>
                  </div>
                  </nav>
                 
                  <nav class="transparent hide-on-med-and-down">
                  <ul>
                  <form action="administracion.php" method="POST">

                    <li><a style="margin-left:60px; margin-right:60px;" class="btn btn-large orange" href="productos_admin.php"> <i class="fas fa-store"></i> Productos</a></li>
                        <li> <button name="tabla" value="compras" type="submit" class="btn btn-large orange" href="sass.html"><i class="fas fa-dollar-sign"></i> Ventas</button></li>
                        <li><button name="tabla" value="users" type="submit" style="margin-left:60px; margin-right:10px;" class="btn btn-large orange" href="badges.html"><i class="fas fa-users"></i> Usuarios</button></li>
                        
                        
                    </form>
                  </ul>
                  </nav>



                  <nav class="amber darken-4 hide-on-small-only hide-on-large-only">
                <div class="nav-wrapper ">
                    
                    <a style="padding-left:10px;" href="#"> <i class="fas fa-cogs"></i> Panel de administracion:</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                
                      </ul>
                  </div>
                  </nav>
                 
                  <nav class="transparent hide-on-small-only hide-on-large-only">
                  <ul>
                  <form action="administracion.php" method="POST">

                    <li><a style="margin-right:10px;" class="btn orange" href="productos_admin.php"><span style="font-size:12px;"> <i class="fas fa-store"></i> Productos</span></a></li>
                        <li> <button name="tabla" value="compras" type="submit" class="btn orange" href="sass.html"><span style="font-size:12px;"><i class="fas fa-dollar-sign"></i> Ventas</span></button></li>
                        <li><button name="tabla" value="users" type="submit" style="margin-left:10px; margin-right:10px;" class="btn orange" href="badges.html"><span style="font-size:12px;"><i class="fas fa-users"></i> Usuarios</span></button></li>
                        
                        
                    </form>
                  </ul>
                  </nav>


                  <nav class="amber darken-4 hide-on-med-and-up">
                <div class="nav-wrapper ">
                    
                    <a style="padding-left:10px;" href="#"> <i class="fas fa-cogs"></i> Panel de administracion:</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                
                      </ul>
                  </div>
                  </nav>
                 
                  <nav class="transparent hide-on-med-and-up">
                  <ul>
                  <form action="administracion.php" method="POST">

                    <li><a style="margin-right:10px;" class="btn orange" href="productos_admin.php"><span style="font-size:8px;"> <i class="fas fa-store"></i> Productos</span></a></li>
                        <li> <button name="tabla" value="compras" type="submit" class="btn orange" href="sass.html"><span style="font-size:8px;"><i class="fas fa-dollar-sign"></i> Ventas</span></button></li>
                        <li><button name="tabla" value="users" type="submit" style="margin-left:10px; margin-right:10px;" class="btn orange" href="badges.html"><span style="font-size:8px;"><i class="fas fa-users"></i> Usuarios</span></button></li>
                        
                        
                    </form>
                  </ul>
                  </nav>

                  

                  <br>


                  <div class="row">
                       
                        
                        
                        <form id="mi_formulario" action="busqueda_administrador_ventas.php" method="POST"></form>
                        <div class="col s12  center">
                         
                        <?php if( $tabla=='compras'): ?> 

                                <ul class="collapsible">
                                        <li>
                                            
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Filtrar</b></div>
                                            <div class="collapsible-body"><span><button type="submit"  form="mi_formulario" class="btn orange"> <b>BUSCAR EN LAS VENTAS</b></button></span></div>
                                            
                                        </li>
                                </ul>
                               
                         <?php endif; ?>
                        
                         <?php if( $tabla=='users'): ?> 

                        <ul class="collapsible">
                                <li>
                                    
                                    <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Filtrar</b></div>
                                    <div class="collapsible-body"><span><a href="busqueda_administrador_usuarios.php" class="btn orange"> <b>BUSCAR EN LOS USUARIOS</b></a></span></div>
                                
                                </li>
                        </ul>

                        <?php endif; ?>


                        </div>
                       

                 </div>
                 
           
    </div>

    <div class="row">
    <div class="col s12 m8 offset-m2 center"> 
                
                   
                        
                <?php 

                $id=$row['id'];
                
                require ('conexion.php');

                $sql= "SELECT * FROM '$tabla'";
                $hay= mysqli_query($conexion,$consulta);
                $si= $hay -> fetch_assoc();

                

                if($si){ 
                    if($tabla=='compras'){
                        $especial= "SELECT * FROM compras";
                        
                    }
                    if($tabla=='users'){
                        $especial= "SELECT * FROM users";
                        
                    }
                    
                    $esp= mysqli_query($conexion,$especial);
                    $fet= $esp->fetch_assoc();

                    //sadsadsadas
                    if($tabla=='compras'){
                        $sql= "SELECT DISTINCT codigo_referencia FROM compras ORDER BY fecha DESC";
                        ?>
                        <h3 class="center orange-text"><b>Se muestran todas las ventas: </b></h3>
                        <?php
                    }
                    if($tabla=='users'){
                        $sql= "SELECT DISTINCT id FROM users";
                        ?>
                        <h3 class="center orange-text"><b>Se muestran todos los usuarios : </b></h3>
                        <?php
                    }

                    
                    $resu= $conexion -> query($sql);
                    
                    $cont=1;
                    if($tabla=='compras'){
                    while ($fs=$resu->fetch_assoc()){
                        ?>
                        <table class="responsive-table">
                        <thead>
                            <td bgcolor="#ff6f00" class="center white-text" colspan="10"><b>Compra</b></td>
                            
                        </thead>
                        <?php
                        
                        $ref=$fs['codigo_referencia'];
                        $nuevo= "SELECT * FROM compras where codigo_referencia='$ref'";
                        $tabla= $conexion -> query($nuevo);
                        ?>
                        <tbody>
                        <tr bgcolor="#ffe082" style="border-bottom: 2px solid;">
                        <td><b>Ref.</b></td>
                        <td><b>Fecha</b></td>
                        <td><b >Correo</b></td>
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
                            
                            $identi=$da['id_user'];

                            $alla="SELECT * FROM users WHERE id='$identi'";  
                            $barra=$conexion->query($alla);
                            $f=$barra->fetch_assoc();
                           
                        ?>

                                    

                                    <tr bgcolor="#ffe082" style="border-bottom: none;">
                                        
                                    <td><?php echo $da['codigo_referencia']?> </td>
                                    <td style="font-size:.80em;"><?php echo $da['fecha'] ?> </td>
                                    <td style="font-size:.80em;"><?php echo $f['correo'] ?> </td>
                                    <td style="font-size:.80em;"><?php echo $da['nombre_user'] ?> </td>
                                    <td style="font-size:.80em;"><?php echo $da['ap_paterno'] ?> </td>
                                    <td style="font-size:.80em;"><?php echo $da['ap_materno'] ?> </td>
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
                         <td colspan="9" class="green-text"><span class="right"><button value="<?php echo $infodecompra;?>" form="form_prueba" type="submit" name="infodecompra" class="btn btn-small grey">Imprimir reporte de venta</button> </span></td>
                         <td colspan="1" class="green-text"><span class="right"><b><?php echo "Total: ".$totalidad; ?></b> </span></td> 
                   </tr>
                    <form target="_blank" id="form_prueba" action="impresion/index.php" method="POST">
                
                    </form>
                    </tbody>
                    </table>
                    <br>
                    <br>
                    <?php
                    }
                
                
                } if($tabla=='users'){
                    
                        ?>
                        <table class="responsive-table">
                        <thead>
                            <td bgcolor="#ff6f00" class="center white-text" colspan="9"><b>Lista de usuarios</b></td>
                            
                        </thead>
                        <?php
                        
                        
                        $nuevo= "SELECT * FROM users";
                        $tabla= $conexion -> query($nuevo);
                        ?>
                        <tbody>
                        <tr bgcolor="#ffe082" style="border-bottom: 2px solid;">
                        <td><b>ID</b></td>
                        <td><b>Activa</b></td>
                        <td><b>Nombre</b></td>
                        <td><b>Apellido paterno</b></td>
                        <td><b>Apellido materno</b></td>
                        <td><b>Correo</b></td>
                       
                        </tr>
                        <?php
                        $totalidad=0;
                        while($da=$tabla->fetch_assoc()){ 
                        ?>
                        
                                    <tr bgcolor="#ffe082" style="border-bottom: none;">

                                    
                                    <td><?php echo $da['id'] ?> </td>
                                    <td><?php  if ($da['estado']) {echo "ACTIVA";} else{ echo "INACTIVA";}; ?> </td>
                                    <td><?php echo $da['nombre'] ?> </td>
                                    <td><?php echo $da['ap_paterno'] ?> </td>
                                    <td><?php echo $da['ap_materno'] ?> </td>
                                    <td><?php echo $da['correo'] ?> </td>
                                    
                                    
                                    
                                    </tr>
                                   
                                    

                    <?php  
                        }
                    ?>
                       

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