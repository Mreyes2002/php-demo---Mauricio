<?php 
include('usuario.php');
    
$id = $_GET["id"];
$usuario = new Usuario($conexion);
$usuario = $usuario->obtenerUnUsuario($id);
$title = "Editar usuario";
include 'header.php';

?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h2>Editar Usuario</h2>
        </div>
        <div class="card-body">
            <form action="procesar_editar_usuario.php" method="post" class="w-75 mx-auto">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $usuario['direccion']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $usuario['telefono']; ?>" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="listar_usuarios.php" class="btn btn-secondary">Volver a la Lista de Usuarios</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
