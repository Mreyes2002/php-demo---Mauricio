<?php
// Incluye los archivos necesarios
include('conexion.php');
include('usuario.php');

// Verifica si el método de solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    // Muestra los datos recibidos para depuración (elimina en producción)
    echo "ID: $id<br>";
    echo "Nombre: $nombre<br>";
    echo "Dirección: $direccion<br>";
    echo "Teléfono: $telefono<br>";

    // Crea una instancia de Usuario
    $usuarioObj = new Usuario($conexion);

    // Actualiza el usuario
    if ($usuarioObj->actualizarUsuario($id, $nombre, $direccion, $telefono)) {
        // Redirige a la lista de usuarios si la actualización fue exitosa
        header("Location: listar_usuarios.php");
        exit();
    } else {
        // Muestra un mensaje de error si la actualización falló
        echo "Error al actualizar el usuario.";
    }
} else {
    // Muestra un mensaje de error si la solicitud no es POST
    echo "Método de solicitud no válido.";
}
?>
