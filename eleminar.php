<?php
// Incluye los archivos necesarios
include('conexion.php');
include('usuario.php');

// Verifica si el método de solicitud es GET y si se ha proporcionado un ID
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Obtén el ID del usuario desde la solicitud GET
    $id = $_GET['id'];

    // Crea una instancia de Usuario
    $usuarioObj = new Usuario($conexion);

    // Elimina el usuario
    if ($usuarioObj->eliminarUsuario($id)) {
        // Redirige a la lista de usuarios con mensaje de éxito
        header("Location: listar_usuarios.php?message=Usuario eliminado con éxito");
        exit();
    } else {
        // Redirige a la lista de usuarios con mensaje de error
        header("Location: listar_usuarios.php?message=Error al eliminar el usuario");
        exit();
    }
} else {
    // Redirige a la lista de usuarios con mensaje de error si el ID no está presente o el método no es GET
    header("Location: listar_usuarios.php?message=Método de solicitud no válido o falta el ID del usuario");
    exit();
}
?>
