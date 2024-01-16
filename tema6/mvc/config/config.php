<?php

// CONSTANTES QUE VAMOS A USAR EN TODA LA APLICACIÓN
define("IMG","./webroot/img/");
define("CSS","./webroot/css/");
define("JS","./webroot/js/");
define("VIEW","./views/");
define("CON","./controllers/");

require('./config/confBD.php');

require('./dao/FactoryBD.php');
require('./models/User.php');
require('./dao/UserDAO.php');

?>