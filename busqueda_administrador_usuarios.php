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

if (isset($_POST['nombrecorreo'])){
    $nombre_per=$_POST['nombre_per'];
    $paterno_per=$_POST['paterno_per'];
    $materno_per=$_POST['materno_per'];
    $correo_per=$_POST['correo_per'];

    $sql="SELECT * from users WHERE nombre='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND correo='$correo_per'";
    $otro= "SELECT DISTINCT id FROM users WHERE nombre='$nombre_per' AND ap_paterno='$paterno_per' AND ap_materno='$materno_per' AND correo='$correo_per' ORDER BY id ASC";
} 
if (isset($_POST['nombrepaterno'])){
    $nombre_per=$_POST['nombre_per'];
    $paterno_per=$_POST['paterno_per'];
   

    $sql="SELECT * from users WHERE nombre='$nombre_per' AND ap_paterno='$paterno_per'";
    $otro= "SELECT DISTINCT id FROM users WHERE nombre='$nombre_per' AND ap_paterno='$paterno_per' ORDER BY id ASC";
}
if (isset($_POST['nombrematerno'])){
    $nombre_per=$_POST['nombre_per'];
    $materno_per=$_POST['materno_per'];

    $sql="SELECT * from users WHERE nombre='$nombre_per' AND ap_materno='$materno_per'";
    $otro= "SELECT DISTINCT id FROM users WHERE nombre='$nombre_per' AND ap_materno='$materno_per' ORDER BY id ASC";
}
if (isset($_POST['correocorreo'])){
    $correo_per=$_POST['correo_per'];

    $sql="SELECT * from users WHERE correo='$correo_per'";
    $otro= "SELECT DISTINCT id FROM users WHERE correo='$correo_per' ORDER BY id ASC";
}
if (isset($_POST['usuariousuario'])){

    $usuario_per=$_POST['usuario_per'];

    $sql="SELECT * from users WHERE tipo_usuario='$usuario_per'";
    $otro= "SELECT DISTINCT id FROM users WHERE tipo_usuario='$usuario_per' ORDER BY id ASC";
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

    <title>Busqueda de usuarios</title>
    
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
        <form id="mi_formulario" action="busqueda_administrador_usuarios.php" method="POST"></form>
                        <div class="col s12  center">
                        <a style='margin:10px' class='btn btn-large orange' href='administracion.php'><i style='font-size:20px' class='fas fa-cogs'></i> Panel de administración</a>
                                <h3 class="orange-text">Seleccione el tipo de filtro para los usuarios</h3>

                                <ul class="collapsible">
                                        <li>
                                            
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Nombre completo y correo</b></div>
                                            <div class="collapsible-body">
                                            <form class="center" action="busqueda_administrador_usuarios.php" method="POST">
                                            <p class="center"><b>Nombre</b></p>
                                        <input name="nombre_per" class="center" placeholder="Nombre" type="text">
                                        <p class="center"><b>Apellido paterno</b></p>
                                        <input name="paterno_per" class="center" placeholder="Apellido paterno" type="text">
                                        <p class="center"><b>Apellido materno</b></p>
                                        <input name="materno_per" class="center" placeholder="Apellido materno" type="text">
                                        <p class="center"><b>Correo</b></p>
                                        <input name="correo_per" class="center" placeholder="Correo" type="text">
                                            
                                        <button name="nombrecorreo" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                     </form>
                                            
                                            </div>
                                        </li>
                                </ul>

                                <ul class="collapsible">
                                        <li>
                                            
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Nombre y apellido paterno</b></div>
                                            <div class="collapsible-body">
                                            <form class="center" action="busqueda_administrador_usuarios.php" method="POST">
                                            <p class="center"><b>Nombre</b></p>
                                        <input name="nombre_per" class="center" placeholder="Nombre" type="text">
                                        <p class="center"><b>Apellido paterno</b></p>
                                        <input name="paterno_per" class="center" placeholder="Apellido paterno" type="text">
                                     
                                            
                                        <button name="nombrepaterno" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                     </form>
                                            
                                            </div>
                                        </li>
                                </ul>

                                <ul class="collapsible">
                                            <li>
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Nombre y apellido materno</b></div>
                                            <div class="collapsible-body">
                                                
                                            <form class="center" action="busqueda_administrador_usuarios.php" method="POST">
                                                        <p class="center"><b>Nombre</b></p>
                                                    <input name="nombre_per" class="center" placeholder="Nombre" type="text">
                                                    <p class="center"><b>Apellido materno</b></p>
                                                    <input name="materno_per" class="center" placeholder="Apellido materno" type="text">
                                                       
                                                    <button name="nombrematerno" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                            </form></div>

                                            </li>
                                </ul>

                                <ul class="collapsible">
                                            <li>
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Correo </b></div>
                                            <div class="collapsible-body">
                                                
                                            <form class="center" action="busqueda_administrador_usuarios.php" method="POST">
                                                        <p class="center"><b>Correo</b></p>
                                                    <input name="correo_per" class="center" placeholder="Correo" type="text">
                                                    <button name="correocorreo" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
                                            </form>
                                            
                                            </li>
                                </ul>

                                <ul class="collapsible">
                                            <li>
                                            <div class="collapsible-header amber darken-4 white-text"><b><i class="fas fa-search"></i> Por Tipo usuario </b></div>
                                            <div class="collapsible-body">
                                                
                                              <form class="center" action="busqueda_administrador_usuarios.php" method="POST">

                                              <select name="usuario_per" class="browser-default">
                                                    <option value="" disabled selected>Tipo de usuario</option>
                                                    <option value="admin">Administrador</option>
                                                    <option value="user">Usuario</option>
                                             </select>
                                                    <button name="usuariousuario" type="submit" class="btn green"><i class="fas fa-search"></i> Buscar</button>
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

                        $id=$row['id'];


                        $ejecucion= mysqli_query($conexion,$sql);
                        
                        if ( $fila= $ejecucion -> fetch_array()){
                            
                            
                            
                            
                            $resu= $conexion -> query($otro);
                            
                            while ($fs=$resu->fetch_assoc()){
                                
                                ?>
                                <table class="responsive-table">
                                <thead>
                                    <td bgcolor="#ff6f00" class="center white-text" colspan="10"><b>Usuario</b></td>
                                    
                                </thead>
                                <?php
                                
                                
                                $ident=$fs['id'];
                                $nuevo= "SELECT * FROM users where id='$ident'";
                                $tabla= $conexion -> query($nuevo);
                                ?>
                                <tbody>
                                <tr bgcolor="#ffe082" style="border-bottom: 2px solid;">
                                <td><b>ID</b></td>
                                <td ><b>Estado</b></td>
                                <td colspan="2" ><b>Tipo de usuario</b></td>
                                <td><b>Nombre</b></td>
                                <td><b>Apellido paterno</b></td>
                                <td><b>Apellido materno</b></td>
                                <td><b>Correo</b></td>
                                <td class="center" colspan="2"><b>Accion</b></td>
                                
                                </tr>
                                <?php
                                $totalidad=0;
                                while($da=$tabla->fetch_assoc()){ 
                                ?>
                                
                                            <tr bgcolor="#ffe082" style="border-bottom: none;">

                                            <td><?php echo $da['id']; ?> </td>
                                            <td><?php  if ($da['estado']) {echo "ACTIVA";} else{ echo "INACTIVA";}; ?> </td>
                                            <td><?php  if ($da['tipo_usuario']=='user') {echo "Usuario";}?> </td>
                                            <td><?php  if ($da['tipo_usuario']=='admin') {echo "Administrador";} ?> </td>
                                            <td><?php echo $da['nombre'] ?> </td>
                                            <td><?php echo $da['ap_paterno'] ?> </td>
                                            <td><?php echo $da['ap_materno'] ?> </td>
                                          
                                            <td><?php echo $da['correo'] ?> </td>
                                            
                                            <td> <a href="eliminar_usuario.php"><button name="accion_usuario" form="formulario_eliminador" value="<?php echo $da['correo']; ?>" class="btn red"><i class="fas fa-trash white-text"></i><?php echo " ".$da['id']; ?></button>  </a></td>
                                            <td> <a href="eliminar_usuario.php"><button name="accion_usuario" form="formulario_editor" value="<?php echo $da['correo'];?>" class="btn orange"><i class="fas fa-user-edit white-text"></i><?php echo " ".$da['id']; ?></button>  </a></td>
                                             
                                            
                                            </tr>
                                           
                                            <form id="formulario_eliminador" method="POST" action="borrar_usuario.php">

                                            </form>

                                            <form id="formulario_editor" method="POST" action="modificar_usuario.php">

                                            </form>

                            <?php  
                                }
                            ?>
                            

                            </tbody>
                            </table>
                            <br>
                            <br>
                            <?php
                            }
                        } else {
                            ?>
                            <h3 class="orange-text"> Sin resultados para esa búsqueda </h3>
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
Aquí no se fije, No se quitó con nada el desgracio

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