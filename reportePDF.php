<?php
include 'plantilla.php';

$mysqli = new mysqli("localhost", "root", "", "signature_igs16");
		if($mysqli->connect_error){
			die("conexion fallida: " . $mysqli->connect_error);
		}
		$sql = "SELECT materia_id, docente_id, dias, grupo, fecha_inicio, fecha_fin, hora_inicio, hora_fin FROM horarios";
		$resultado = $mysqli->query($sql);

	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'Materia',1,0,'C',1);
	$pdf->Cell(35,6,'Docente',1,0,'C',1);
	$pdf->Cell(35,6,'Dias',1,0,'C',1);
	$pdf->Cell(35,6,'Grupo',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Inicio',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Final',1,0,'C',1);
	$pdf->Cell(35,6,'Hora Inicio',1,0,'C',1);
	$pdf->Cell(35,6,'Hora Final',1,1,'C',1);


	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(35,6,utf8_decode($row['materia_id']),1,0,'C');
		$pdf->Cell(35,6,$row['docente_id'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['dias']),1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['grupo']),1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['fecha_inicio']),1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['fecha_fin']),1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['hora_inicio']),1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['hora_fin']),1,1,'C');
	}
	$pdf->Output();

?>