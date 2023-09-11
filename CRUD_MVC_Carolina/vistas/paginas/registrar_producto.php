<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="post">
    <div class="form-group">
        <label for="proveedor">Nombre del proveedor:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-pen"></i>
                </span>
            </div>
        <input type="text" class="form-control" placeholder="Agregar proveedor" id="proveedorProducto" name="proveedorProducto">
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <div class="input-group">    
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-font"></i>
                </span>
            </div>
        <input type="text" class="form-control" placeholder="Agregar descripcion" id="descripcionProducto" name="descripcionProducto">
        </div>
    </div>

    <div class="form-group">
        <label for="tipo_producto">Seleccione un tipo de queso:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-check"></i>
                </span>
            </div>
            <select class="form-select" aria-label="Agregar tipo de producto" id="tipoProducto" name="tipoProducto" autofocus>
                <option selected></option>
                <option value="Cuajada">Cuajada</option>
                <option value="Quesito">Quesito</option>
                <option value="Poroso">Poroso</option>
                <option value="Salado">Salado</option>
                <option value="Queso molido">Queso molido</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="precio">Precio:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-coins"></i>
                </span>
            </div>
        <input type="number" class="form-control" placeholder="Agregar precio" id="precioProducto" name="precioProducto">  
        </div>
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-percent"></i>
                </span>
            </div>
        <input type="number" class="form-control" placeholder="Agregar stock" id="stockProducto" name="stockProducto">  
        </div>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha de caducidad:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-stopwatch"></i>
                </span>
            </div>
        <input type="date" class="form-control" placeholder="Agregar fecha" id="fechaProducto" name="fechaProducto">  
        </div>
    </div>

    <div class="form-group">
        <?php
            $registro = ControladorProducto::ctrRegistro();
            if ($registro == "ok") {
                echo '<div class="alert alert-success"> El producto ha sido registrado exitosamente</div>';
            }
        ?>
                
        <button type="submit" class="btn btn-primary"><a href="index.php?pagina=inicio" style="color: #ffffff">Cancelar</a></button>
        <button type="submit" class="btn btn-primary">Registrar producto</button>
    </div>
    </form>
</div>