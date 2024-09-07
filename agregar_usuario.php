<?php
  $title = "Agregar usuario";
  include 'header.php';
?>
<div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h2 class="text-center mb-4">Agregar Usuarios</h2>
            <form action="procesarUsuario.php" method="post">
                <!-- Campo para el Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                
                <!-- Campo para la Dirección -->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control">
                </div>
                
                <!-- Campo para el Teléfono -->
                <div class="mb-4">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control">
                </div>
                
                <!-- Botón de Envío -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
 <!-- Enlace de vuelta a la lista de usuarios -->
<div class="text-center mt-4">
    <a href="listar_usuarios.php" class="btn btn-secondary" style="background-color: brown; border-color: brown;">Volver a la Lista de Usuarios</a>
</div>



<?php include 'footer.php'; ?>
