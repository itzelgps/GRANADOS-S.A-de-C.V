<?php
session_start();                                 // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

$varsesion= $_SESSION['usuario'];                // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE

if( $varsesion==null || $varsesion= '' ) {       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    header("Location:iniciodesesion.php");       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
    die();                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE
}                                       // ESTE BLOQUE EVITA INTRUSOS EN TODAS LAS PANTALLAS QUE LAS UTILICE



if(isset($_POST['concretar_compra'])){

    require ('conexion.php');

    $usuario=$_SESSION['usuario'];
    $direccion=$_POST['direccion'];
    $nombre=$_POST['nombre'];
    $ap_paterno=$_POST['ap_paterno'];
    $ap_materno=$_POST['ap_materno'];

    $veri= "SELECT * FROM carrito WHERE id_user='$usuario'";
    $results= mysqli_query($conexion,$veri);

    $refe= "SELECT MAX(codigo_referencia) AS codigo FROM compras";
    $busqueda= mysqli_query($conexion,$refe);
    $solu=mysqli_fetch_assoc($busqueda);
    
    $referencia= $solu['codigo']+1;
    $veces=1;
                
                if($filas=mysqli_fetch_assoc($results)){

                    $v= "SELECT * FROM carrito WHERE id_user='$usuario'";
                    $res= mysqli_query($conexion,$v);
                    while($fi=mysqli_fetch_assoc($res)){

                        $producto=$fi['nombre'];
                        $precio=$fi['precio'];
                        $cantidad=$fi['cantidad_deseada'];
                        $total=$fi['total'];
                        date_default_timezone_set ( 'America/Mexico_City' );
                        $fecha=date("Y-m-d H:i:s");


                        $veri= "INSERT INTO compras VALUES (default,'$referencia',$usuario,'$nombre','$ap_paterno','$ap_materno','$direccion','$producto','$precio','$cantidad','$total','$fecha')";
                        $results= mysqli_query($conexion,$veri);

                        $veri= "DELETE FROM carrito WHERE id_user='$usuario' and nombre='$producto'";
                        $results= mysqli_query($conexion,$veri);


                        $veri= "SELECT * from productos WHERE nombre='$producto'";
                        $results= mysqli_query($conexion,$veri);
                        $aso=mysqli_fetch_assoc($results);

                        $cambio=$aso['stock']-$cantidad;
                        $veri= "UPDATE productos set stock='$cambio' WHERE nombre='$producto'";
                        $results= mysqli_query($conexion,$veri);



                        header("Location:errores/confirmacion_compra.php");
                    }
            
            

    } else{ 

        header("Location:pedidos.php");
            
            }       

}else{ 

    header("Location:pedidos.php");}



?>