<?php

require_once 'config/configurar.php';

require_once 'helpers/url_helper.php';

//require_once 'lib/Db.php';
//require_once 'lib/Controlador.php';
//require_once 'lib/Core.php';

//AUTOLOAD PHP

spl_autoload_register(function($nombreClase){
  require_once 'lib/' .$nombreClase. '.php';

});