<?php
$conexion = new mysqli("localhost", "root", "", "organizacion_app");

$resultado = $conexion->query("
    SELECT D.id, P.nombre AS proyecto, N.nombre AS donante, D.monto, D.fecha
    FROM DONACION D
    JOIN PROYECTO P ON D.id_proyecto = P.id
    JOIN DONANTE N ON D.id_donante = N.id
");

echo "<h2>Listado de Donaciones</h2>";
echo "<table border='1'>
<tr><th>#</th><th>Proyecto</th><th>Donante</th><th>Monto</th><th>Fecha</th></tr>";

$contador = 1;
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>{$contador}</td>
        <td>{$fila['proyecto']}</td>
        <td>{$fila['donante']}</td>
        <td>{$fila['monto']}</td>
        <td>{$fila['fecha']}</td>
    </tr>";
    $contador++;
}

echo "</table>";
$conexion->close();
?>
