<?php 
    include('conexion.php');
    include('usuario.php');
    
    $usuario = new Usuario($conexion);
    $usuarios = $usuario->listarUsuarios();
    $title = "Lista usuarios";
    include 'header.php';
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h1>Lista de Usuarios</h1>
        </div>
        <div class="card-body">
            <?php
            // Mostrar mensaje si está presente en la URL
            if (isset($_GET['message'])) {
                echo '<div class="alert alert-info">' . htmlspecialchars($_GET['message']) . '</div>';
            }
            ?>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['direccion']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="eliminar.php?id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="agregar_usuario.php" class="btn btn-primary">Agregar Usuario</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
