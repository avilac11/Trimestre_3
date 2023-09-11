<?php
    class ControladorFormulario {
        static public function ctrRegistro() {
            if (isset($_POST["txtNombre"])) {
                if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["txtNombre"]) && filter_var($_POST["txtEmail"], FILTER_VALIDATE_EMAIL) && preg_match('/^[0-9a-zA-Z]+$/', $_POST["txtPassword"])) {
                    $tabla = "usuarios_poo";
                    $token = md5($_POST["txtNombre"] . "+" . $_POST["txtEmail"]);
                    $password = password_hash($_POST["txtPassword"], PASSWORD_BCRYPT);
                    $datos = array("token" => $token,
                    "nombre" => $_POST["txtNombre"],
                    "email" => $_POST["txtEmail"],
                    "password" => $password);    
                    $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
                    if ($respuesta == "ok") {
                        return $respuesta;
                    } else {
                        $respuesta = "error";
                        return $respuesta;
                    }
                } else {
                    $respuesta = "error";
                    return $respuesta;
                }
            }
        }

        static public function ctrSeleccionarRegistros($item, $valor) {
            $tabla = "usuarios_poo";
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
            return $respuesta;
        }

        static public function ctrIngreso() {
            if(isset($_POST["txtEmail"])) {
                $tabla = "usuarios_poo";
                $item = "email";
                $valor = $_POST["txtEmail"];
                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
                if(empty($_POST["txtEmail"]) || empty($_POST["txtPassword"])) {
                    echo '<div class="alert alert-danger">Error, debe ingresar su información para poder iniciar sesión</div>
                    <script>
                        setTimeout(function() {
                            window.location = "index.php?pagina=salir";
                        }, 2000);
                    </script>';
                    exit;
                }
                if(!$respuesta) {
                    exit;
                }
                $password = $_POST["txtPassword"];
                if($respuesta["email"] == $valor && password_verify($password, $respuesta["password"])) {
                   $_SESSION["validarIngreso"] = "ok";
                   echo '<script>
                   if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                    </script>';
                } else {
                    echo '<div class="alert alert-danger">Error, el usuario o la contraseña no son válidos</div>';
                    echo '<script>
                    if (window.history.replaceState) {
                        setTimeout(function() {
                            window.history.replaceState(null, null, window.location.href);
                        }, 2000);   
                    }
                    </script>';
                }
            }
        }             
    }
?>