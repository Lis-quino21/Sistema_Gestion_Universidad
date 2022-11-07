<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{


    //Iniciar Sesion
    static public function IniciarSesionM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE libreta = :libreta");

        $pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    //Ver Mis Datos
    static public function VerMisDatosM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;


    }


    //Guardar Mis Datos
    static public function GuardarDatosM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, 
                                                               direccion = :direccion,
                                                               telefono = :telefono,
                                                               correo = :correo,
                                                               preparatoria = :preparatoria,
                                                               pais = :pais,
                                                               clave = :clave WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_INT);
        $pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_INT);
        $pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
        $pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_INT);
        $pdo -> bindParam(":preparatoria", $datosC["preparatoria"], PDO::PARAM_INT);
        $pdo -> bindParam(":pais", $datosC["pais"], PDO::PARAM_INT);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_INT);

        if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;
        
    }




}