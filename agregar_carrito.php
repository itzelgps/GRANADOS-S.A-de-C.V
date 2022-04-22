<?php
session_start();                                 // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

$varsesion= $_SESSION['usuario'];                // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

if( $varsesion==null || $varsesion= '' ) {       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    header("Location:iniciodesesion.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    die();                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
}                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE



if(isset($_POST['agregar'])){

    require ('conexion.php');

    $cantidad=$_POST['cantidad'];
    $tipo=$_POST['tipo_mango'];
    $usuario=$_SESSION['usuario'];

    $veri= "SELECT * FROM carrito WHERE id_user='$usuario' AND nombre='$tipo'";
    $results= mysqli_query($conexion,$veri);
    
    
    
    if($filas=mysqli_fetch_assoc($results)){
        
        $nueva_cantidad=$cantidad+$filas['cantidad_deseada'];
        $nuevo_total= ($filas['total'] + ($cantidad * $filas['precio']));

        $sql= "UPDATE carrito SET cantidad_deseada='$nueva_cantidad',total='$nuevo_total' WHERE id_user='$usuario' AND nombre='$tipo'";
        $res= $conexion -> query($sql);
        header ("Location:pedidos.php");

    } else{ 



            //INSERCION NORMAL
            
            require ('conexion.php');

            $consulta= "SELECT * FROM users WHERE id='$varsesion'";
            $resultado= mysqli_query($conexion,$consulta);
            $row= $resultado -> fetch_assoc();

            
            
            
            $sql= "SELECT * FROM productos WHERE nombre='$tipo'";
            $res= $conexion -> query($sql);
            $fila=$res->fetch_assoc();
        
            $total= $cantidad * $fila['precio'];

            $usuario=$_SESSION['usuario'];
            $nombre=$fila['nombre'];
            $precio=$fila['precio'];

            $sql= "INSERT INTO carrito values (default,'$usuario','$nombre','$precio','$cantidad','$total')";
            $res= $conexion -> query($sql);
            
            header ("Location:pedidos.php");
            }       

}



?>