
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
	
foreach ($result as $row) :	

    $pdf->Cell(30,10,'PRESTAMO CIRCULANTE',0,0);
    $pdf->Cell(50);
    $pdf->Cell(30,10,'No. CARNET',0,0);
    $pdf->Cell(10);
    $pdf->Cell(10,10,'FECHA',0,0);
    $pdf->Ln(6);
    $pdf->Cell(30,10,'HISTORIAL',0,0);
    $pdf->Cell(50);
    $pdf->Cell(30,10,$row['idSol'],0,0,);
    $pdf->Cell(10);
    $pdf->Cell(10,10,date('d/m/Y'),0,0,'L');
    $pdf->Ln(15);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80);
    $pdf->Cell(30,10,'DATOS PERSONALES DEL SOLICITANTE',0,0,'C');
    $pdf->Ln(15);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(10,10,utf8_decode('APELLIDOS Y NOMBRE: '.$row['apeSol'].' '.$row['nomSol'].'     CEDULA DE IDENTIDAD: '.$row['cedSol'].'      EDAD:'.$row['edadSol']),10,0);
    $pdf->Ln(7);
    $pdf->Cell(30,10,utf8_decode('SEXO: '.$row['sexSol'].'       DIRECCION DE HABITACION: '.$row['dirSol']),0,0);
    $pdf->Ln(7);
    $pdf->Cell(30,10,utf8_decode('TELEFONO:'.$row['teleSol'].'       CORREO ELECTRONICO: '.$row['corrSol']),0,0);
    $pdf->Ln(12);
    $pdf->Cell(30,10,utf8_decode('OCUPACION: '.$row['nomOcup'].'       INSTITUCION O EMPRESA: '.$row['nomInst']),0,0);
    $pdf->Ln(7);
    $pdf->Cell(30,10,utf8_decode('TELEFONO: '.$row['telInst'].'       DIRECCION: '.$row['dirInst']),0,0);
    $pdf->Ln(12);

endforeach;
foreach ($resultuser as $row) :	

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30);
    $pdf->Cell(30,10,utf8_decode('FIRMA SOLICITANTE'),0,0);
    $pdf->Cell(40);
    $pdf->Cell(30,10,utf8_decode('FUNCIONARIO'),0,0);
    $pdf->Ln(5);
    $pdf->Cell(100);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,10,utf8_decode($row['name_user']),0,0);
    $pdf->Ln(30);

endforeach;


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(15,6,'COTA',1,0,'C',1);
	$pdf->Cell(60,6,'TITULO',1,0,'C',1);
	$pdf->Cell(50,6,'AUTOR',1,0,'C',1);
    $pdf->Cell(20,6,'F.E.',1,0,'C',1);
    $pdf->Cell(20,6,'F.D.',1,1,'C',1);

    foreach ($resultpre as $clave) :
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(15,6,$clave['cota'],1,0,'C');
    $pdf->Cell(60,6,utf8_decode($clave['titulo']),1,0,'C');
	$pdf->Cell(50,6,utf8_decode($clave['autor']),1,0,'C');
    $pdf->Cell(20,6,$clave['fe'],1,0,'C');
    $pdf->Cell(20,6,$clave['fd'],1,1,'C');


endforeach;

$pdf->Output();
?>