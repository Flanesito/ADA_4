<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? "";
    $correo = $_POST["correo"] ?? "";
    $mensaje = $_POST["mensaje"] ?? "";

    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        $stmt = $conexion->prepare("INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES (?, ?, ?)");
        
        if (!$stmt) {
            die("Error en la consulta SQL: " . $conexion->error);
        }

        $stmt->bind_param("sss", $nombre, $correo, $mensaje);
        
        if (!$stmt->execute()) {
            die("Error al insertar en la BD: " . $stmt->error);
        }
        
        $stmt->close();
        header("Location: panel_servidor.php");
        exit;
    } else {
        die("Llegaron datos vacíos a PHP. Datos recibidos: " . print_r($_POST, true));
    }
} else {
    die("No se recibió petición POST. Método recibido: " . $_SERVER["REQUEST_METHOD"]);
}
?>