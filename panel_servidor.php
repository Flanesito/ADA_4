<?php 
require_once "conexion.php"; // Incluimos el archivo de conexion a la base de datos

// Consultamos los registros de ambas tablas
$resultado_lenguajes = $conexion->query("SELECT * FROM lenguajes_web");
$resultado_mensajes = $conexion->query("SELECT * FROM mensajes_contacto ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Servidor Local</title>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li> <a href="index.html">Volver al Inicio</a> </li>
                <li> <a href="contacto.html">Ir a Contacto</a> </li>
            </ul>
        </nav>
    </header>

    <main>

        <h1>Estado del Servidor Local y Base de Datos</h1>
        <p> <strong>Conexión MySQL:</strong> Activa y funcionando correctamente desde <em>localhost</em>. </p>

        <h2>1. Tabla: lenguajes_web (Datos desde MySQL)</h2>
        <table border="1" cellpadding="8" style="width: 100%; border-collapse: collapse; margin-bottm: 30px;">
        
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lenguaje</th>
                    <th>Función</th>
                    <th>Nivel</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $resultado_lenguajes->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["lenguaje"]; ?></td>
                    <td><?php echo $fila["funcion"]; ?></td>
                    <td><?php echo $fila["nivel"]; ?></td>

                </tr>
                <?php endwhile; ?>
            </tbody>

        </table>

    </main>

    <footer>
        <p>Servidor Local ejecutándose con Apache, PHP y MySQL</p>
    </footer>

</body>
</html>