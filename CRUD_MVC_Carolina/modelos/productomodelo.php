<?php
require_once "conexion.php";

class ModeloProductos {
    static public function mdlRegistro($tabla1, $datos1) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(tokenProducto, proveedor, descripcion, tipo, stock, precio, fecha) VALUES(:tokenProducto, :proveedor, :descripcion, :tipo, :stock, :precio, :fecha)");

        $stmt -> bindParam(":tokenProducto", $datos1["tokenProducto"], PDO::PARAM_STR);
        $stmt -> bindParam(":proveedor", $datos1["proveedor"], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $datos1["descripcion"], PDO::PARAM_STR);
        $stmt -> bindParam(":tipo", $datos1["tipo"], PDO::PARAM_STR);
        $stmt -> bindParam(":stock", $datos1["stock"], PDO::PARAM_INT);
        $stmt -> bindParam(":precio", $datos1["precio"], PDO::PARAM_INT);
        $stmt -> bindParam(":fecha", $datos1["fecha"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlSeleccionarRegistros($tabla1, $item1, $valor1) {
        if ($item1 == null && $valor1 == null) {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla1 ORDER BY idProducto ASC");
            $stmt -> execute();
            return $stmt -> fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla1 WHERE $item1 = :$item1 ORDER BY idProducto ASC");
            $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }   
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlBuscar($tabla1) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE idProducto = :idProducto");           
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        } 
    }

    static public function mdlActualizarRegistro($tabla1, $datos1) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla1 SET proveedor=:proveedor, descripcion=:descripcion, tipo=:tipo, stock=:stock, precio=:precio, fecha=:fecha WHERE tokenProducto=:tokenProducto");
        
        $stmt -> bindParam(":proveedor", $datos1["proveedor"], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $datos1["descripcion"], PDO::PARAM_STR);
        $stmt -> bindParam(":tipo", $datos1["tipo"], PDO::PARAM_STR);
        $stmt -> bindParam(":stock", $datos1["stock"], PDO::PARAM_INT);
        $stmt -> bindParam(":precio", $datos1["precio"], PDO::PARAM_INT);
        $stmt -> bindParam(":fecha", $datos1["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":tokenProducto", $datos1["tokenProducto"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }   
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlEliminarRegistro($tabla1, $valor1) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE tokenProducto=:tokenProducto");
        $stmt -> bindParam(":tokenProducto", $valor1, PDO::PARAM_STR);
        if($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt -> close();
        $stmt = null;
    }
}