<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.locations = "inicio"
    </script>';

    return;

}

?>


<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de Carreras Universitarias</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <form method="post">

                    <div class="col-md-6 col-xs-12">

                        <input type="text" name="carrera" class="form-control" placeholder="Ingresar Nueva Carrera" reqireed>

                    </div>

                   <button type="submit" class="btn btn-primary">Crear Carreras</button>

                </form>

                <?php

                $crearCarrera = new CarrerasC();
                $crearCarrera -> CrearCarrerasC();

                ?>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-hower table-striped">

                    <thead>

                        <tr>

                            <th>Codigo</th>
                            <th>Nombre</th> 
                            <th>Acciones</th> 
                            
                        </tr>
                     
                </thead>

                      <tbody>

                          <?php

                          $resultado = CarrerasC::VerCarreras();

                          foreach ($resultado as $key => $values){

                              echo '<tr>
                                        
                                            <tr>

                                            <td>'.$values'</td>
                                            <td>Ingenieria en informatica</td>
                
                                            <td>
                
                                                <div class="btn-group">
                
                                                    <a herf="#">
                                                        <button class="btn btn-success">Editar</button>
                                                    </a>
                
                                                    <a herf="#">
                                                        <button class="btn btn-danger">Borrar</button>
                                                    </a>
                
                                                    <a herf="#">
                                                        <button class="btn btn-warning">Materias</button>
                                                    </a>
                
                                                    <a herf="#">
                                                        <button class="btn btn-primary">Estudiantes</button>
                                                    </a>
                
                                                </div>
                
                                            </td>
                
                                        </tr>'
                        
                          }

                          ?>


                      </tbody>

                   </table>

            </div>


        </div>

    </section>

</div>