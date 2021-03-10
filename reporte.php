<?php

require("./conexion.php");
require("./library/fpdf/fpdf.php");
//Generar la consulta SQL
$sql = "SELECT * FROM alumnos";
$resultado = $mysqli->query($sql);

$pdf = new FPDF("P", "mm", "letter");
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(200, 5, "Reporte de Estudiantes", 0, 1, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 5, "Id", 1, 0, "C");
$pdf->Cell(40, 5, "Nombre", 1, 0, "C");
$pdf->Cell(40, 5, "Apellido", 1, 0, "C");
$pdf->Cell(30, 5, "Genero", 1, 0, "C");
$pdf->Cell(40, 5, "Dirección", 1, 0, "C");
$pdf->Cell(40, 5, "Correo", 1, 1, "C");
$pdf->SetFont("Arial", "", 10);
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(10, 5, $fila['codigoalumno'], 1, 0, "C");
    $pdf->Cell(40, 5, $fila['nombre'], 1, 0, "C");
    $pdf->Cell(40, 5, $fila['apellido'], 1, 0, "C");
    $pdf->Cell(30, 5, $fila['genero'], 1, 0, "C");
    $pdf->Cell(40, 5, $fila['direccion'], 1, 0, "C");
    $pdf->Cell(40, 5, $fila['correo'], 1, 1, "C");
}
$pdf->Output();
