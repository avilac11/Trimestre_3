<?php
error_reporting(0);

if(!isset($_SESSION["validarIngreso"])) {
    echo '<script> window.location="index.php?pagina=ingreso"; </script>';
    return;
} else {
    if(!$_SESSION["validarIngreso"]) {
        echo '<script> window.location="index.php?pagina=ingreso"; </script>';
    }
}              
$usuarios1 = ControladorProducto::ctrSeleccionarRegistros(null, null);

// Conexion a mano
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'poo_crud';
try{
    $con = new PDO("mysql:host=$server;dbname=$database;",$user,$pass);
}catch (PDOException $e){
    die('Error de conexion: '.$e->getMessage());
}
// Conexion a mano
// Buscar por ID
if(isset($_GET["idproducto_search"])){
    $sql = 'SELECT * FROM `productos` WHERE idProducto  = :idProducto';
    $idproducto = (isset($_GET["idproducto_search"])?$_GET["idproducto_search"]:"");
    $stm = $con->prepare($sql);
    $stm->bindParam(":idProducto",$idproducto);
    $stm->execute();
    $producto_search = $stm->fetch(PDO::FETCH_ASSOC);
    if($producto_search["descripcion"] > 0){
        $mensage_search = "Error";
    }else{
        $mensage_search = "";
    }
}
// Buscar por ID
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if(!empty($mensage_search)): ?>
    <div class="modal_search">
        <div class="con_modal">
            <div class="con_contenido_modal">
                <table>
                    <thead>
                        <th>#</th>
                        <th>Proveedor</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Fecha de caducidad</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $producto_search["idProducto"]?></td>
                            <td><?php echo $producto_search["proveedor"];?></td>
                            <td><?php echo $producto_search["descripcion"];?></td> 
                            <td><?php echo $producto_search["tipo"];?></td>
                            <td><?php echo $producto_search["stock"];?></td>          
                            <td><?php echo $producto_search["precio"];?></td>                   
                            <td><?php echo $producto_search["fecha"];?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-warning" title="Editar"><a href="index.php?pagina=editar&idProducto=<?php echo $producto_search["idProducto"];?>"><i class="fas fa-edit" style="color: #000000"></i></a></button>
        
                                    <form method="post">   
                                        <input type="hidden" name="eliminarProducto" value="<?php echo $producto_search["idProducto"];?>">
                                        <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash" style="color: #000000"></i></button>  
                                    </form>
                                    <?php
                                        $eliminar = ControladorProducto::ctrEliminarRegistro();
                                    ?>
                                </div>
                            </td>
                        </tr>  
                    </tbody>
                </table>
            </div>
            <button><a class="con_btn_cerrar" href="index.php?pagina=inicio"><i class="fas fa-circle-xmark" style="color: #000000"></i></a></button>
        </div>
    </div>
    <!-- Modal search -->
<?php endif; ?>
<div class="container-fluid bg-light">
    <div class="container py-5">
        <form method="get" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="idproducto_search" placeholder="Buscar producto por ID">
                <div class="input-group-append">
                <button class="btn btn-secondary" type="submit"><a><i class="fas fa-magnifying-glass" style="color: #000000">Buscar</i></a></button>
                </div>
            </div>
        </form> <br>

        <div>
            <button type="submit" class="btn btn-secondary" title="registrarProducto"><a href="index.php?pagina=registrar_producto"><i class="fas fa-plus" style="color: #000000"> Agregar producto</i></a></button>
        </div> <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Proveedor</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Fecha de caducidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios1 as $key => $value):?>
                    <tr>
                        <td><?php echo $value["idProducto"]?></td>
                        <td><?php echo $value ["proveedor"];?></td>
                        <td><?php echo $value ["descripcion"];?></td> 
                        <td><?php echo $value ["tipo"];?></td>
                        <td><?php echo $value ["stock"];?></td>          
                        <td><?php echo $value ["precio"];?></td>                   
                        <td><?php echo $value ["fecha"];?></td>
                        <td>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-warning" title="Editar"><a href="index.php?pagina=editar&idProducto=<?php echo $value["token"];?>"><i class="fas fa-edit" style="color: #000000"></i></a></button>

                                <form method="post">   
                                    <input type="hidden" name="eliminarProducto" value="<?php echo $value["token"];?>">
                                    <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash" style="color: #000000"></i></button>  
                                </form>
                                <?php
                                    $eliminar = ControladorProducto::ctrEliminarRegistro();
                                ?>
                            </div>
                        </td>
                    </tr>  
                <?php endforeach ?>
            </tbody>
        </table>  
    </div>
</div>
</body>
</html>