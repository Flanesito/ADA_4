<?php 
// Configuracion del servidor local XAMPP
$servidor = "localhost";
$usuario = "root";   // Usuario por defecto en XAMPP es "root"
$password = "";      // En XAMPP la contraseña por defecto es una cadena vacía
$base_datos = "sitio_personal"; // Nombre de la base de datos que creaste

// Creamos la conexion con MySQL
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificamos si hubo algun error al conectar
if ( $conexion->connect_error ) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>