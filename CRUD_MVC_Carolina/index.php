<?php 
    require_once "controlador/plantillacontrolador.php";
    require_once "controlador/formulariocontrolador.php";
    require_once "controlador/productocontrolador.php";
    require_once "modelos/conexion.php";
    require_once "modelos/formulariomodelo.php";
    require_once "modelos/productomodelo.php";

    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTraerPlantilla();
?>