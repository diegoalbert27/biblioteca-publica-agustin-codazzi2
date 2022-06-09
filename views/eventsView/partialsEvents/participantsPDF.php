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

    $pdf->Cell(5);
    $pdf->Cell(30,10,'EVENTO',0,0); 
    $pdf->Ln(10);
    $pdf->Cell(5);
    $pdf->Multicell(160,6,utf8_decode($result[0]['title_event']),0,'L',0);
    $pdf->Ln(6);

    $pdf->SetFont('Arial','',12);
    
    $pdf->Cell(5);
    $pdf->Multicell(160,7,utf8_decode($result[0]['info_event']),0,'L',0);
    $pdf->Ln(5);
    $pdf->Cell(5);
    $pdf->Cell(10,10,utf8_decode('ORGANIZADOR: '.$result[0]['organizer_event'].'        FECHA: '.$result[0]['date_realized_event']),10,0);
    $pdf->Ln(9);
    $pdf->Cell(5);
    $pdf->Cell(10,10,utf8_decode('TIPO DE EVENTO: '.$result[0]['type_event'].'          AFORO: '.$result[0]['participants_event'].'         ESTADO: '.$result[0]['state_event']),10,0);
    $pdf->Ln(11);
    $pdf->Cell(5);
    $pdf->Multicell(160,7,utf8_decode('LUGAR: '.$result[0]['place_event']),0,'L',0);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','B',14);

    $pdf->Cell(5);
    $pdf->Cell(30,10,'PARTICIPANTES E INTERESADOS EN EL EVENTO',0,0); 
    $pdf->Ln(15);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(5);
	$pdf->Cell(80,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(30,6,'TELEFONO',1,0,'C',1);
	$pdf->Cell(70,6,'CORREO ELECTRONICO',1,1,'C',1);

    foreach ($result as $clave) :
	
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(5);
	$pdf->Cell(80,6,utf8_decode($clave['name_user']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($clave['tlf_user']),1,0,'C');
	$pdf->Cell(70,6,utf8_decode($clave['correo_user']),1,1,'C');

    endforeach;

$pdf->Output();
?>