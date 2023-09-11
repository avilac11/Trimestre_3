<?php
    class ControladorProducto {
        static public function ctrRegistro() {
            if (isset($_POST["proveedorProducto"])) {
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["proveedorProducto"]) && preg_match('/^[a-zA-Z0-9_]+[.]+$/', $_POST["descripcionProducto"]) && preg_match('/^[0-9]+$/', $_POST["stockProducto"]) && preg_match('/^[0-9]+$/', $_POST["precioProducto"]) && preg_match('/^[0-9]+$/', $_POST["fechaProducto"])) {
                $tabla1 = "productos";
                $tokenProducto = md5($_POST["proveedorProducto"]. "+" .$_POST["descripcionProducto"]. "+" .$_POST["stockProducto"]. "+" .$_POST["precioProducto"]. "+" .$_POST["fechaProducto"]);
                $datos1 = array("tokenProducto" => $tokenProducto,"proveedor" => $_POST["proveedorProducto"], "descripcion" => $_POST["descripcionProducto"], "tipo" => $_POST["tipoProducto"], "stock" => $_POST["stockProducto"], "precio" => $_POST["precioProducto"], "fecha" => $_POST["fechaProducto"]);
                $respuesta = ModeloProductos::mdlRegistro($tabla1, $datos1);
                return $respuesta;
                } else {
                    $respuesta = "error";
                return $respuesta;
                }
            }
        }

        static public function ctrSeleccionarRegistros($item1, $valor1) {
            $tabla1 = "productos";
            $respuesta = ModeloProductos::mdlSeleccionarRegistros($tabla1, $item1, $valor1);
            return $respuesta;
        }    
    
        static public function ctrActualizarRegistro() {
            $usuario1 = ModeloProductos::mdlSeleccionarRegistro("productos", "tokenProducto", $_POST["tokenProducto"]);
            $compararToken = md5($usuario1["fechaProducto"]."+".$usuario1["stockProducto"]);
            if($compararToken == ["tokenProducto"]) {
                if(isset($_POST["actualizarTipoProducto"])) {
                    if($_POST["actualizarStockProducto"] != null || $_POST["actualizarFechaProducto"] != null) {
                        $stock = $_POST["actualizarStockProducto"];
                        $fecha = $_POST["actualizarFechaProducto"];
                    } else {
                        $stock = $_POST["stockActual"];
                        $fecha = $_POST["fechaActual"];
                    }
                    $tabla1 = "productos";
                    $datos1 = array("tokenProducto" =>$_POST["tokenPro"], "proveedor" =>$_POST["actualizarNombreProveedor"], "descripcion" =>$_POST["actualizarDescripcionProducto"], "tipo" =>$_POST["actualizarTipoProducto"], "stock" =>$_POST["actualizarStockProducto"], "precio" =>$_POST["actualizarPrecioProducto"], "fecha" =>$_POST["actualizarFechaProducto"]);
                    $respuesta = ModeloProductos::mdlActualizarRegistro($tabla1, $datos1);
                    return $respuesta;
                } else {
                    $respuesta = "error";
                    return $respuesta;
                }
            }
        }

        static public function ctrEliminarRegistro() {
            $usuario1 = ModeloProductos::mdlSeleccionarRegistro("productos", "tokenProducto", $_POST["eliminarRegistro"]);
            $compararToken = md5($usuario1["fechaProducto"]."+".$usuario1["stockProducto"]);
            if($compararToken == ["eliminarRegistro"])
            if (isset($_POST["eliminarProducto"])) {
                $tabla1 = "productos";
                $valor1 = $_POST["eliminarProducto"];
                $respuesta = ModeloProductos::mdlEliminarRegistro($tabla1, $valor1);
                if ($respuesta == "ok") {
                    echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                    </script>';
                }
            }
        }
    }
?>