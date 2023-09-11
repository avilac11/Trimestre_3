<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="post">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        <input type="text" class="form-control" placeholder="Agregar su nombre" id="nombre" name="txtNombre">
        </div>
    </div>

    <div class="form-group">
        <label for="email">Correo:</label>
        <div class="input-group">    
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
        <input type="email" class="form-control" placeholder="Agregar email" id="email" name="txtEmail">
        </div>
    </div>

    <div class="form-group">
        <label for="pwd">Contraseña:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
        <input type="password" class="form-control" placeholder="Agregar contraseña" id="password" name="txtPassword">  
        </div>
    </div>

    <?php 
        $registro = ControladorFormulario::ctrRegistro();
        if ($registro == "ok") {
            echo '<div class="alert alert-success"> El usuario ha sido registrado exitosamente</div>';
        }
    ?>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>