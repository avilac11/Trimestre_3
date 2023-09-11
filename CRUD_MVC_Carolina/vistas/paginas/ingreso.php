<div class="container-fluid bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-center text-center">
        <form class="p-5 bg-light" method="post">
        
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" class="form-control" placeholder="Agregar email" id="email" name="txtEmail">
        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" placeholder="Agregar contraseña" id="password" name="txtPassword">
        </div>

        <?php 
            $ingreso = new ControladorFormulario();
            $ingreso -> ctrIngreso();
        ?>

        <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
    </div>
</div>