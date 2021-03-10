<?php

require("./conexion.php");
require("./plantilla.php");
//Generar la consulta SQL
$sql = "SELECT * FROM alumnos";
$resultado = $mysqli->query($sql);

$pdf = new PDF("P", "mm", "letter");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 5, "Id", 1, 0, "C");
$pdf->Cell(40, 5, "Nombre", 1, 0, "C");
$pdf->Cell(40, 5, "Apellido", 1, 0, "C");
$pdf->Cell(30, 5, "Genero", 1, 0, "C");
$pdf->Cell(40, 5, utf8_decode("Dirección"), 1, 0, "C");
$pdf->Cell(40, 5, "Correo", 1, 1, "C");
$pdf->SetFont("Arial", "", 10);
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(10, 5, $fila['codigoalumno'], 1, 0, "C");
    $pdf->Cell(40, 5, utf8_decode($fila['nombre']), 1, 0, "C");
    $pdf->Cell(40, 5, utf8_decode($fila['apellido']), 1, 0, "C");
    $pdf->Cell(30, 5, $fila['genero'], 1, 0, "C");
    $pdf->Cell(40, 5, utf8_decode($fila['direccion']), 1, 0, "C");
    $pdf->Cell(40, 5, utf8_decode($fila['correo']), 1, 1, "C");
}
$pdf->Output();
