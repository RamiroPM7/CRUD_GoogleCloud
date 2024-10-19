<?php
$usuario = 'root';
$pass = 'root2';
$db = 'tienda_online'; 
$port = '1234';
$host = '127.0.0.1'; 

$conexion = new mysqli($host, $usuario, $pass, $db, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
echo "Conexión exitosa<br>";

// Consulta SQL corregida
$query = "SELECT * FROM Clientes";
$resultado = $conexion->query($query);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Salida de datos de cada fila
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id_cliente"] . 
             " - Nombre: " . $fila["nombre"] . 
             " - Email: " . $fila["email"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conexion->close();
?>
