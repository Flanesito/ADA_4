<?php
require_once "conexion.php"; // Incluimos el archivo de conexion a la base de datos

if ($_SERVER["REQUEST_METOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? "";
    $correo = $_POST["correo"] ?? "";
    $mensaje = $_POST["mensaje"] ?? "";

    // Validamos que los campos no esten vacios
    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        // Preparamos la consulta SQL para insertar los datos en la tabla mensajes_contacto
        $stmt = $conexion->prepare("INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $mensaje);

        // Ejecutamos la consulta y verificamos si fue exitosa
        if ($stmt->execute()) {
            echo "Mensaje enviado correctamente.";
        } else {
            echo "Error al enviar el mensaje: " . $stmt->error;
        }

        // Cerramos la declaración y la conexión
        $stmt->close();
        $conexion->close();
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
}

// Redirigir el panel para ver el mensaje recien guardado
header("Location: panel_servidor.php");
exit;
?>