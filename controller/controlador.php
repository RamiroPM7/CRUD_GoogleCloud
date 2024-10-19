<?php
class Controlador {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para obtener todos los clientes
    public function obtenerClientes() {
        $query = "SELECT * FROM Clientes";
        $resultado = $this->conexion->query($query);

        $clientes = [];
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $clientes[] = $fila;
            }
        }
        return $clientes;
    }

    // Método para crear un nuevo cliente
    public function crearCliente($nombre, $email, $telefono, $direccion) {
        $query = "INSERT INTO Clientes (nombre, email, telefono, direccion) VALUES ('$nombre', '$email', '$telefono', '$direccion')";
        return $this->conexion->query($query);
    }

    // Método para actualizar un cliente
    public function actualizarCliente($id_cliente, $nombre, $email, $telefono, $direccion) {
        $query = "UPDATE Clientes SET nombre='$nombre', email='$email', telefono='$telefono', direccion='$direccion' WHERE id_cliente=$id_cliente";
        return $this->conexion->query($query);
    }

    // Método para eliminar un cliente
    public function eliminarCliente($id_cliente) {
        $query = "DELETE FROM Clientes WHERE id_cliente=$id_cliente";
        return $this->conexion->query($query);
    }

    // Método para obtener todas las categorías
    public function obtenerCategorias() {
        $query = "SELECT * FROM Categorias";
        $resultado = $this->conexion->query($query);

        $categorias = [];
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $categorias[] = $fila;
            }
        }
        return $categorias;
    }

    // Método para obtener todos los productos
    public function obtenerProductos() {
        $query = "SELECT * FROM Productos";
        $resultado = $this->conexion->query($query);

        $productos = [];
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $productos[] = $fila;
            }
        }
        return $productos;
    }

    // Método para obtener todas las órdenes
    public function obtenerOrdenes() {
        $query = "SELECT * FROM Ordenes";
        $resultado = $this->conexion->query($query);

        $ordenes = [];
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $ordenes[] = $fila;
            }
        }
        return $ordenes;
    }

    // Método para obtener todos los detalles de orden
    public function obtenerDetallesOrden() {
        $query = "SELECT * FROM Detalle_orden";
        $resultado = $this->conexion->query($query);

        $detalles_orden = [];
        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $detalles_orden[] = $fila;
            }
        }
        return $detalles_orden;
    }
}

// Configuración de conexión a la base de datos
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

// Crear instancia del controlador
$controlador = new Controlador($conexion);

// Ejemplos de uso
$clientes = $controlador->obtenerClientes();
$categorias = $controlador->obtenerCategorias();
$productos = $controlador->obtenerProductos();
$ordenes = $controlador->obtenerOrdenes();
$detallesOrden = $controlador->obtenerDetallesOrden();

print_r($clientes);
print_r($categorias);
print_r($productos);
print_r($ordenes);
print_r($detallesOrden);

// Cerrar conexión
$conexion->close();
?>
