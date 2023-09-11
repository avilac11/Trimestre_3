<?php
require_once "conexion.php";

class ModeloFormularios {
    static public function mdlRegistro($tabla,$datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios_poo(token, nombre, email, password) VALUES(:token, :nombre, :email, :password)");

        $stmt -> bindParam(":token", $datos["token"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlSeleccionarRegistros($tabla, $item, $valor) {
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(registro, '%d/%m/%Y') AS registro FROM usuarios_poo ORDER BY token ASC");
            $stmt -> execute();
            return $stmt -> fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(registro, '%d/%m/%Y') AS registro FROM usuarios_poo WHERE $item = :$item ORDER BY token ASC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }   
        $stmt -> close();
        $stmt = null;
    }

    // static public function mdlActualizarRegistro($tabla, $datos) {
    //     $stmt = Conexion::conectar()->prepare("UPDATE usuarios_poo SET nombre=:nombre, email=:email, password=:password WHERE id=:id");
        
    //     $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

    //     if ($stmt -> execute()) {
    //         return "ok";
    //     } else {
    //         print_r(Conexion::conectar()->errorInfo());
    //     }   
    //     $stmt -> close();
    //     $stmt = null;
    // }

    // static public function mdlEliminarRegistro($tabla, $valor) {
    //     $stmt = Conexion::conectar()->prepare("DELETE FROM usuarios_poo WHERE id=:id");
    //     $stmt -> bindParam(":id", $valor, PDO::PARAM_INT);
    //     if($stmt -> execute()) {
    //         return "ok";
    //     } else {
    //         print_r(Conexion::conectar()->errorInfo());
    //     }
    //     $stmt -> close();
    //     $stmt = null;
    // }
}