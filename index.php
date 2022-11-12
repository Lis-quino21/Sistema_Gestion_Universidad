<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();

echo "Hola Liseth";
