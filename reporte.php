<?php
	require_once 'Classes/PHPExcel.php';
		$mysqli = new mysqli("localhost", "root", "", "signature_igs16");
		if($mysqli->connect_error){
			die("conexion fallida: " . $mysqli->connect_error);
		}
		$sql = "SELECT materia_id, docente_id, dias, grupo, fecha_inicio, fecha_fin, hora_inicio, hora_fin FROM horarios";
		$resultado = $mysqli->query($sql);
		$fila=7;

		$gdImage = imagecreatefrompng('img/otras/mouse.png');//es logotipo 

		$objPHPExcel = new PHPExcel ();
		$objPHPExcel->getProperties()->setCreator("Singanature Igs16")->setDescription("Reporte de horarios de los docentes");
		//establacemos el nombre de la pestaña y nombre de la pestaña activa 
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle("Horarios de Clases");
		
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Logotipo');
		$objDrawing->setDescription('Logotipo');
		$objDrawing->setImageResource($gdImage);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objDrawing->setHeight(100);
		$objDrawing->setCoordinates('A1');
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


		$estiloTituloReporte = array(
    	'font' => array(
		'name'      => 'Arial',
		'bold'      => true,
		'italic'    => false,
		'strike'    => false,
		'size' =>13
    	),
    	'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
    	'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_NONE
		)
    	),
    	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    	));

    	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);

		$objPHPExcel->getActiveSheet()->getStyle('C1:H4')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A6:H6')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->setCellValue('C3', 'HORARIO DE PROFESORES');
		$objPHPExcel->getActiveSheet()->mergeCells('C3:H3');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);

		$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Materia');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('B6', 'Docente');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('C6', 'Dias Laborales');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Grupo');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Fecha Inicio');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$objPHPExcel->getActiveSheet()->setCellValue('F6', 'Fecha Fin');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Horario Inicio');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$objPHPExcel->getActiveSheet()->setCellValue('H6', 'Horario Fin');
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);

		while ($row = $resultado->fetch_assoc()){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['materia_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['docente_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['dias']);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row['grupo']);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row['fecha_inicio']);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['fecha_fin']);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row['hora_inicio']);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $row['hora_fin']);

			$fila++;
		}

		header("Content-Type: application/vnd.openx,lformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachmen;filename="Horario.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = new PHPExcel_writer_Excel2007($objPHPExcel);
		$objWriter->save('php://output');

?>