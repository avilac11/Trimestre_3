<?php
    if(isset($_GET["token"])) {
        $item1 = "token";
        $valor1 = $_GET["token"];
        $usuario1 = ControladorProducto::ctrSeleccionarRegistros($item1, $valor1); 
    }
?>
<div class="d-flex justify-content-center">
    <form class="p-8 bg-light" method="post">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-font"></i>
                </span>
            </div>
        <input type="text" class="form-control" value="<?php echo $usuario1["proveedor"];?>" placeholder="Cambiar nombre del proveedor" id="nombreProducto" name="actualizarNombreProveedor">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-pen"></i>
                </span>
            </div>
        <input type="text" class="form-control" value="<?php echo $usuario1["descripcion"];?>" placeholder="Cambiar descripcion del producto" id="descripcionProducto" name="actualizarDescripcionProducto">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-check"></i>
                </span>
            </div>
            <select class="form-select" value="<?php echo $usuario1["tipo"];?>" aria-label="Cambiar tipo de producto" id="tipoProducto" name="actualizarTipoProducto" autofocus>
                <option selected></option>
                <option value="Cuajada">Cuajada</option>
                <option value="Quesito">Quesito</option>
                <option value="Poroso">Poroso</option>
                <option value="Salado">Salado</option>
                <option value="Queso molido">Queso molido</option>
            </select>
            <input type="hidden" class="form-control" name="tipoActual" value="<?php echo $usuario1["tipo"];?>">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-percent"></i>
                </span>
            </div>
        <input type="hidden" class="form-control" name="stockActual" value="<?php echo $usuario1["stock"];?>">
        
        <input type="number" class="form-control" value="<?php echo $usuario1["stock"];?>" placeholder="Cambiar stock del producto" id="stockProducto" name="actualizarStockProducto">
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-coins"></i>
                </span>
            </div>
        <input type="text" class="form-control" value="<?php echo $usuario1["precio"];?>" placeholder="Cambiar precio del producto" id="precioProducto" name="actualizarPrecioProducto">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-stopwatch"></i>
                </span>
            </div>
        <input type="date" class="form-control" placeholder="Cambiar fecha de caducidad del producto" id="fechaProducto" name="actualizarFechaProducto">
        
        <input type="hidden" class="form-control" name="fechaActual" value="<?php echo $usuario1["fecha"];?>">
        
        <input type="hidden" class="form-control" name="tokenPro" value="<?php echo $usuario1["token"];?>">
        </div>
    </div>

    <div class="form-group">
        <?php
            $actualizar = ControladorProducto::ctrActualizarRegistro();
            if($actualizar == "ok") {
            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo '<div class="alert alert-success"> El producto ha sido actualizado </div>
            <script>
                setTimeout(function() { 
                    window.location = "index.php?pagina=inicio";
                }, 3000);
            </script>';
            }
            if($actualizar == "error") {
            echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            </script>';
            echo '<div class="alert alert-danger"> Error, el producto no ha podido ser actualizado </div>'
            }
        ?>
                
        <button type="submit" class="btn btn-primary"><a href="index.php?pagina=inicio" style="color: #ffffff">Cancelar</a></button>
        <button type="submit" class="btn btn-primary">Actualizar producto</button>
    </div>
    </form>
</div>