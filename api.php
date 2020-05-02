<?php

require 'global.php';

//Base para los controladores
require_once 'core/ControladorBase.php';

//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';

require 'routes/api.php';

//echo class_exists('Database') ? 'existe' : 'no existe';
