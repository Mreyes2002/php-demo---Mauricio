<?php 
require 'usuario.php';
require 'conexion.php';
$usuario = new Usuario($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    if ($usuario->agregarUsuario($nombre, $direccion, $telefono)) {
        // El usuario se agregó correctamente, redirecciona a la lista de usuarios
        header("Location: listar_usuarios.php");
        exit();
    } else {
        // Hubo un error al agregar el usuario, muestra un mensaje de error
        echo "Error al agregar el usuario.";
    }

}
else{
    echo "Error al agregar el usuario.";
}




?>

