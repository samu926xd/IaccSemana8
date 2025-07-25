<?php
$conexion = new mysqli("localhost", "root", "", "organizacion_app");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre_donante'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$monto = $_POST['monto_donado'];

$stmt = $conexion->prepare("INSERT INTO donante (nombre, correo, telefono, monto_donado) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $nombre, $correo, $telefono, $monto);

if ($stmt->execute()) {
    echo "Donante registrado correctamente.<br><a href='ver_donantes.php'>Ver donantes</a>";
} else {
    echo "Error al registrar el donante: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
