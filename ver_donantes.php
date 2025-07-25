<?php
$conexion = new mysqli("localhost", "root", "", "organizacion_app");
$resultado = $conexion->query("SELECT * FROM donante");

echo "<h2>Lista de Donantes</h2><table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Monto Donado</th></tr>";

while($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['nombre']}</td>
            <td>{$fila['correo']}</td>
            <td>\${$fila['monto_donado']}</td>
          </tr>";
}
echo "</table>";

$conexion->close();
?>
