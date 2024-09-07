<?php
include 'conexion.php';
class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerUnUsuario($id)
    {
        // Realiza una consulta SQL
        $query = "SELECT * FROM usuario where id=".$id."";
        $resultado = $this->conexion->query($query);

        if ($resultado)
         {
            $usuario = $resultado->fetch_assoc();
            $resultado->free(); // Liberar el resultado
            return $usuario;
        }
         else {
            echo "Error al listar usuarios: " . $this->conexion->error;
            return null;
        }

       
    }
    public function listarUsuarios() {
        $usuarios = array();

        // Realiza una consulta SQL
        $query = "SELECT * FROM usuario";
        $resultado = $this->conexion->query($query);

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
            $resultado->free(); // Liberar el resultado
        } else {
            echo "Error al listar usuarios: " . $this->conexion->error;
        }

        return $usuarios;
    }

    public function agregarUsuario($nombre, $direccion, $telefono) {
        $query = "INSERT INTO usuario (nombre, direccion, telefono) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sss", $nombre, $direccion, $telefono);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar usuario: " . $stmt->error;
            return false;
        }
    }

    public function actualizarUsuario($id, $nombre, $direccion, $telefono) {
        $query = "UPDATE usuario SET nombre = ?, direccion = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $direccion, $telefono, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al actualizar usuario: " . $stmt->error;
            return false;
        }
    }

    public function eliminarUsuario($id) {
        $query = "DELETE FROM usuario WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al eliminar usuario: " . $stmt->error;
            return false;
        }
    }
}
?>
