
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
        $this->Cell(30,15,'GOBERNACION DEL EDO. ARAGUA',0,0);

        // Salto de línea
        $this->Ln(6);

        $this->SetFont('Arial','B',14);
        $this->Cell(50);
        $this->Cell(30,15,'RED DE BIBLIOTECAS PUBLICAS',0,0);
        $this->Ln(15);
        
    }   

}
	
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
	
foreach ($result as $row) :	

    $pdf->Cell(30,10,'PRESTAMO CIRCULANTE',0,0);
    $pdf->Cell(50);
    $pdf->Cell(30,10,'No. CARNET',0,0);
    $pdf->Cell(10);
    $pdf->Cell(10,10,'FECHA',0,0);
    $pdf->Ln(6);
    $pdf->Cell(30,10,'CARNET',0,0);
    $pdf->Cell(50);
    $pdf->Cell(30,10,$row['idSol'],0,0,);
    $pdf->Cell(10);
    $pdf->Cell(10,10,date('d/m/Y'),0,0,'L');
    $pdf->Ln(25);
    $pdf->Image('assets/img/carnet.png',15,62,85);

    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(90);
    $pdf->Cell(55,15,'PRESTAMO CIRCULANTE',1,0,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(30,35,'FOTO',1,0,'C');
    $pdf->Ln(15);
    $pdf->Cell(90);
    $pdf->Cell(55,10,utf8_decode('Apellidos: '.$row['apeSol']),1,0);
    $pdf->Ln(10);
    $pdf->Cell(90);
    $pdf->Cell(55,10,utf8_decode('Nombres: '.$row['nomSol']),1,0);
    $pdf->Ln(10);
    $pdf->Cell(90);
    $pdf->Cell(45,10,utf8_decode('No. de Carnet: '.$row['idSol']),1,0);
    $pdf->Cell(40,10,utf8_decode('Cédula: '.$row['cedSol']),1,0);

endforeach;
foreach ($resultuser as $row) :	

    $pdf->SetFont('Arial','I',8);
    $pdf->Cell(-110,50,utf8_decode('Documento que se expide a petición de '),0,0,'R');
    $pdf->Cell(11,50,utf8_decode($row['name_user']),0,0,'R');

endforeach;
$pdf->Output();
?>