<?php
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$styleArray = [
    'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,

    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
    ],
];


//'h_right' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,

$spreadsheet = new Spreadsheet();
//$spreadsheet->getActiveSheet()->setPrintGridlines(true);
$sheet = Array();
for($a=0;5>=$a;$a++){

    if($a==0)
    $sheet[$a] = $spreadsheet->getActiveSheet();
    else
$sheet[$a]=$spreadsheet->createSheet();
$sheet[$a]->setTitle('hoja '.($a+1));

$sheet[$a]->setCellValue('A1', 'Instituto Tecnológico Nacional de México en Celaya');
$sheet[$a]->setCellValue('A2', 'Bitácora del laboratorio de manufacturas');
$sheet[$a]->setCellValue('A3', 'Departamento de ingeniería industrial');
$sheet[$a]->setCellValue('A4', 'Fecha: Lunes 26 de diciembre de 2022');

for ($i = 1; 5 > $i; $i++) {
    $sheet[$a]->mergeCells('A' . $i . ':M' . $i);
    $sheet[$a]->getStyle('A' . $i)->getAlignment()->setHorizontal($styleArray['alignment']['horizontal']);
    $sheet[$a]->getStyle('A' . $i)->getAlignment()->setVertical($styleArray['alignment']['vertical']);
}

$sheet[$a]->getStyle('A1:M4')->applyFromArray($styleArray);



$celdas = ['A', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M'];
for ($i = 0, $j = 0; 5 > $i; $i++) {
    $sheet[$a]->getStyle($celdas[$j] . '6' . ':' . $celdas[$j + 1] . '6')->applyFromArray($styleArray);
    $sheet[$a]->mergeCells($celdas[$j++] . '6:' . $celdas[$j++] . '6');
}

$sheet[$a]->setCellValue('A6', 'Nombre completo');
$sheet[$a]->setCellValue('F6', 'Motivo');
$sheet[$a]->setCellValue('H6', 'Hora entrada');
$sheet[$a]->setCellValue('J6', 'Hora salida');
$sheet[$a]->setCellValue('L6', 'Institución');

//$j==0?'h_right': 'horizontal'
for ($i = 0; 10 > $i; $i++) {
    for ($j = 0, $k = 0; 5 > $k; $k++) {
        $sheet[$a]->mergeCells($celdas[$j] . ($i + 7) . ':' . $celdas[$j + 1] . ($i + 7));
        $sheet[$a]->getStyle($celdas[$j++] . ($i + 7) . ':' . $celdas[$j++] . ($i + 7))->applyFromArray($styleArray);
    }
    $sheet[$a]->setCellValue('A' . ($i + 7), 'Ramírez García Marco Isaías');
    $sheet[$a]->setCellValue('F' . ($i + 7), 'Alumno');
    $sheet[$a]->setCellValue('H' . ($i + 7), '12:54:34');
    $sheet[$a]->setCellValue('J' . ($i + 7), '13:56:34');
    $sheet[$a]->setCellValue('L' . ($i + 7), 'ITC');
}
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="file.xlsx"');
$writer->save("php://output");
