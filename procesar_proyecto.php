<?php
$conexion = new mysqli("localhost", "root", "", "organizacion_app");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$responsable = $_POST['responsable'];
$presupuesto = $_POST['presupuesto'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'] ?? NULL;
$estado = $_POST['estado'];

$stmt = $conexion->prepare("INSERT INTO proyecto (nombre, descripcion, responsable, presupuesto, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssddss", $nombre, $descripcion, $responsable, $presupuesto, $fecha_inicio, $fecha_fin, $estado);

if ($stmt->execute()) {
    echo "Proyecto registrado correctamente.<br><a href='ver_proyectos.php'>Ver proyectos</a>";
} else {
    echo "Error al registrar el proyecto: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
