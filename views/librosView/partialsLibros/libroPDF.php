<?php
/* incluimos primeramente el archivo que contiene la clase fpdf */
include ('assets/fpdf/fpdf.php');

class PDF extends FPDF {

    // Cabecera de página
    function Header() {

         // Logo
        $this->Image('assets/img/aragua.png',10,8,33);

        // Arial bold 15
        $this->SetFont('Arial','B',15);

        // Movernos a la derecha
        $this->Cell(50);

        // Título
        $this->Cell(30,10,'GOBERNACION DEL EDO. ARAGUA',0,0);

        // Salto de línea
        $this->Ln(6);

        $this->SetFont('Arial','B',14);
        $this->Cell(50);
        $this->Cell(30,10,'RED DE BIBLIOTECAS PUBLICAS',0,0);
        $this->Ln(20);
    } 
    
    function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);

    // Texto
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,0,utf8_decode('Documento que se expide a petición de la Biblioteca Pública Central "Agustín Codazzi".'),0,0);
}


}
	
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

foreach ($result as $clave) : 

    $pdf->Cell(5);
    $pdf->Cell(30,10,'LIBRO',0,0); 
    $pdf->Ln(10);
    $pdf->Cell(5);
    $pdf->Multicell(160,6,utf8_decode($clave['titulo']),0,'L',0);
    $pdf->Ln(6);

    $pdf->SetFont('Arial','',12);
    
    $pdf->Cell(5);
    $pdf->Multicell(160,7,utf8_decode($clave['sinopsis']),0,'L',0);
    $pdf->Ln(5);
    $pdf->Cell(5);
    $pdf->Cell(10,10,utf8_decode('AUTOR: '.$clave['autor'].'        CATEGORIA: '.$clave['nombrec'].'        ESTADO: '.$clave['estado']),10,0);
    $pdf->Ln(9);
    $pdf->Cell(5);
    $pdf->Cell(10,10,utf8_decode('CANTIDAD TOTAL: '.$clave['total'].'          CANTIDAD ACTUAL: '.$clave['stock'].'         PRESTADOS: '.$clave['resto']),10,0);
    $pdf->Ln(15); 

    $pdf->SetFont('Arial','B',14);

    $pdf->Cell(5);
    $pdf->Cell(30,10,'PRESTAMOS DEL LIBRO',0,0); 
    $pdf->Ln(15);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(5);
	$pdf->Cell(120,6,'SOLICITANTE',1,0,'C',1);
	$pdf->Cell(30,6,'ENTREGA',1,0,'C',1);
	$pdf->Cell(30,6,'DEVOLUCION',1,1,'C',1);

    foreach ($resultP as $claveP) :
	
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(5);
	$pdf->Cell(120,6,utf8_decode($claveP['nom_sol'].' '.$claveP['ape_sol']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($claveP['fecha_entrega']),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($claveP['fecha_devolucion']),1,1,'C');

    endforeach;

endforeach;

$pdf->Output();
?>