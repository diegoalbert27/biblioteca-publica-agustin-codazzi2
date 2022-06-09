
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

	
$pdf->Cell(5);
$pdf->Cell(30,10,'CATEGORIAS DE LOS LIBROS',0,0); 
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
foreach ($result as $clave) :
$pdf->Cell(5);
$pdf->Cell(160,6,utf8_decode($clave['nombre_c'].', ubicado en el piso '.$clave['piso']),0,0);
$pdf->Ln(6);



endforeach;
$pdf->Output();
?>