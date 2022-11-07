<?php

require_once "ConexionBD.php";

class CarrerasM extends ConexionBD{


    //Crear Carreras
    static public function CrearCarreraM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT INTO $tablaBD (nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

        if($pdo -> execute()){;

             return true;

        }

        $pdo -> close();
        $pdo = null;

    }

    //Ver Carrera
    static public function VerCarreraM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;
    }

}