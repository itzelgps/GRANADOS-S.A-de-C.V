<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('http://localhost/PROYECTO%20FINAL/imagenes/ICONO.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,10,'GRANADOS S.A. DE C.V.',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$id=$_POST['infodecompra'];
require ('cn.php');

$consulta="SELECT * FROM compras WHERE codigo_referencia='$id'";
$resultado=$conexion->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(63);
$pdf->Cell(40,10,utf8_decode('¡Gracias por su compra!'));
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->Cell(143,10,utf8_decode('72FX+4C Rancho Alegre del Llano, Técpan de Galeana, Gro.'),0,0,'R',0);
$pdf->Ln(4);


date_default_timezone_set ( 'America/Mexico_City' );
$fecha=date("Y-m-d H:i:s");
$pdf->Cell(100,10,utf8_decode('Fecha: '.$fecha),0,0,'R',0);
$pdf->Cell(140,10,utf8_decode('TEL. 755 138 1522'),0,0,'',0);
$pdf->Ln(4);
$pdf->Cell(118,10,utf8_decode('RFC: GARE9707244I5'),0,0,'R',0);






$pdf->Ln(20);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,utf8_decode('Detalles de la compra:'));
$pdf->Ln(10);
$sql="SELECT * FROM compras WHERE codigo_referencia='$id'";
$res=$conexion->query($sql);
$individual=$res->fetch_assoc();
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,10,utf8_decode('Código de referencia: '.$individual['codigo_referencia']),0,0,'c',0);
$pdf->Cell(60,10,'Fecha de compra: '.$individual['fecha'],0,0,'c',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','b',10);

$pdf->Cell(30,10,'Nombre',1,0,'c',0);
$pdf->Cell(30,10,'Apellido P.',1,0,'c',0);
$pdf->Cell(30,10,'Apellido M.',1,0,'c',0);
$pdf->Cell(30,10,'Producto',1,0,'c',0);
$pdf->Cell(30,10,'Cant. comprada',1,0,'c',0);
$pdf->Cell(20,10,'Precio /kg.',1,0,'c',0);

$pdf->Cell(20,10,'Subtotal',1,1,'c',0);
$totalidad=0;
while($row=$resultado->fetch_assoc()){
    $pdf->SetFont('Arial','',8);
    
    $pdf->Cell(30,10,utf8_decode($row['nombre_user']),1,0,'c',0);
    $pdf->Cell(30,10,utf8_decode($row['ap_paterno']),1,0,'c',0);
    $pdf->Cell(30,10,utf8_decode($row['ap_materno']),1,0,'c',0);
    $pdf->Cell(30,10,$row['nombre_producto'],1,0,'c',0);
    $pdf->Cell(30,10,$row['cantidad_comprada'].' kg',1,0,'c',0);
    $pdf->Cell(20,10,'$'.$row['precio'].' MNX',1,0,'c',0);
    $pdf->Cell(20,10,'$'.$row['total'].' MNX',1,1,'c',0);
    $totalidad+=$row['total'];   
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,utf8_decode('*Iva incluido*   Total: $'.$totalidad),0,1,'R',0);


$dire="SELECT * FROM compras WHERE codigo_referencia='$id'";
$rus=$conexion->query($dire);
$unico=$rus->fetch_assoc();

$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,10,utf8_decode('Dirección de entrega:'),0,1,'c',0);
$pdf->Ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(80,10,utf8_decode($unico['direccion']),0,1,'c',0);


$pdf->Output();
?>