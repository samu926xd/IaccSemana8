<?php
$conexion = new mysqli("localhost", "root", "", "organizacion_app");
$resultado = $conexion->query("SELECT * FROM proyecto");

echo "<h2>Lista de Proyectos</h2><table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Responsable</th><th>Presupuesto</th><th>Estado</th></tr>";

while($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['nombre']}</td>
            <td>{$fila['responsable']}</td>
            <td>\${$fila['presupuesto']}</td>
            <td>{$fila['estado']}</td>
          </tr>";
}
echo "</table>";

$conexion->close();
?>
