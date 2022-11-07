<?php
 
class CarrerasC{

    //Crear carrera
    public function CrearCarrerasC(){

        if(isset($_POST["carreras"])){

            $tablaBD = "carreras";

            $carrera = $_POST["carrera"];

            $resultado = CarreerasM::CrearCarrerasM($tablaBD, $carrera);

            if($resultado == true){

                echo '<script>
                
                window.location = "Carreras";
                </script>';
            }
        }
    }

    //Ver Carreras
    public function VerCarreras(){

        $tablaBD = "carreras";

        $resultado = CarrerasM::VerCarrerasM(tablaBD);

        return $resultado;


    }
}

