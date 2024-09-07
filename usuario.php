<?php
include 'conexion.php'; 

class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Obtener un solo usuario por su ID
    public function obtenerUnUsuario($id) {
        $query = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();
            $stmt->close();
            return $usuario;
        } else {
            echo "Error al obtener el usuario: " . $stmt->error;
            return null;
        }
    }

    // Listar todos los usuarios
    public function listarUsuarios() {
        $usuarios = array();
        $query = "SELECT * FROM usuario";
        $resultado = $this->conexion->query($query);

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
            $resultado->free();
        } else {
            echo "Error al listar usuarios: " . $this->conexion->error;
        }
        return $usuarios;
    }

    // Agregar un nuevo usuario
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

    // Actualizar un usuario existente
    public function actualizarUsuario($id, $nombre, $direccion, $telefono) {
        $query = "UPDATE usuario SET nombre = ?, direccion = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $direccion, $telefono, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                return true;
            } else {
                echo "No se actualizó ningún usuario. Verifica si el ID es correcto.";
                $stmt->close();
                return false;
            }
        } else {
            echo "Error al actualizar usuario: " . $stmt->error;
            $stmt->close();
            return false;
        }
    }

       // Eliminar un usuario
       public function eliminarUsuario($id) {
        $query = "DELETE FROM usuario WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        if ($stmt === false) {
            echo "Error al preparar la consulta: " . $this->conexion->error;
            return false;
        }
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                return true;
            } else {
                // Si no se encontró el usuario, puedes hacer una redirección o mostrar un mensaje
                $stmt->close();
                return false;
            }
        } else {
            echo "Error al eliminar usuario: " . $stmt->error;
            $stmt->close();
            return false;
        }
    }
}
?>