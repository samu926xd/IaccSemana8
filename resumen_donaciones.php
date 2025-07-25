<?php
$conexion = new mysqli("localhost", "root", "", "organizacion_app");

$sql = "
    SELECT 
        P.nombre AS proyecto,
        COUNT(D.id) AS num_donaciones,
        SUM(D.monto) AS total_recaudado
    FROM DONACION D
    JOIN PROYECTO P ON D.id_proyecto = P.id
    GROUP BY P.id
    HAVING COUNT(D.id) > 2
";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Donaciones</title>
</head>
<body>
    <h2>Proyectos con más de 2 donaciones</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Proyecto</th>
            <th>Número de Donaciones</th>
            <th>Total Recaudado ($)</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $fila['proyecto'] ?></td>
            <td><?= $fila['num_donaciones'] ?></td>
            <td><?= number_format($fila['total_recaudado'], 2) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conexion->close();
?>