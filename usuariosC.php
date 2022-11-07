<?php

class UsuariosC{

    //Iniciar Sesion
    public function IniciarSesionC(){

        if(isset($_POST["libreta"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["libreta"]) && preg_match('/^[a-zA-Z0-9.]+$/', $_POST["clave"])){

                $tablaBD = "usuarios";
             
                $datosC = array("libreta"=>$_POST["libreta"], "clave"=>$_POST["clave"]);

                $resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

                if($resultado["libreta"] == $_POST["libreta"] && $resultado["clave"] == $_POST["clave"]){

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["rol"] = $resultado["rol"];
                    $_SESSION["libreta"] = $resultado["libreta"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["id_carrera"] = $resultado["id_carrera"];
                    $_SESSION["id"] = $resultado["id"];


                    echo '<script>

                    window.location = "inicio";
                    </script>';

                }else{

                    echo '<br> <div class="alert alert-danger">Error al Ingresar</div>';

                }

            }

        }

    }


    //Ver Mis Datos
    public function VerMisDatosC(){

        $tablaBD = "usuarios";

        $id = $_SESSION["id"];

        $resultado = UsuariosM::VerMisDatosM($tablaBD, $id);

        echo '<form method="post">

               <div class="row">
 
                   <div class="col-md-6 col-xs-12">

                        <h2>Fecha de Nacimiento:</h2>
                        <input type="text" class="input-lg" name="fechanac" value="'.$resultado["fechanac"].'">

                        <input type="hidden" name="Uid" value="'.$_SESSION["id"].'">

                        <h2>Direccion:</h2>
                        <input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

                        <h2>Telefono:</h2>
                        <input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

                        <h2>Contraseña:</h2>
                        <input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'">

                        </div>


                        <div class="col-md-6 col-xs-12">

                            <h2>Correo Electronico:</h2>
                            <input type="text" class="input-lg" name="correo" value="'.$resultado["correo"].'">

                            <h2>Preparatoria:</h2>
                            <input type="text" class="input-lg" name="preparatoria" value="'.$resultado["preparatoria"].'">

                            <h2>Pais:</h2>
                            <input type="text" class="input-lg" name="pais" value="'.$resultado["pais"].'">

                            <br><br>

                            <button type="submit" class="btn btn-success">Guardar Datos</button>

                        </div>
                        
                </div>

          </form>';

    }





    //Actualizar Mis Datos
    public function GuardarDatosC(){

        if(isset($_POST["Uid"])){

            $tablaBD = "usuarios";

            $datosC = array("id"=>$_POST["Uid"], "fechanac"=>$_POST["fechanac"],
                                                 "direccion"=>$_POST["direccion"], 
                                                 "telefono"=>$_POST["telefono"], 
                                                 "correo"=>$_POST["correo"],
                                                 "preparatoria"=>$_POST["preparatoria"],
                                                 "pais"=>$_POST["pais"],
                                                 "clave"=>$_POST["clave"]);
            $resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                
                      window.location = "http://localhost/universidad/mis-datos";
                      </script>';
            }
        }
    }

}