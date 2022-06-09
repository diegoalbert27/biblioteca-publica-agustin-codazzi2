
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
        $this->Ln(15);
    } 

}
	
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

foreach ($result as $clave) :
	
$pdf->Cell(5);
$pdf->Cell(30,10,'ARTICULO DEL BLOG',0,0); 
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->Multicell(160,6,utf8_decode($clave['title_blog']),0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);

$pdf->Cell(5);
$pdf->Multicell(160,7,utf8_decode($clave['content_blog']),0,'L',0);


endforeach;
$pdf->Output();
?>