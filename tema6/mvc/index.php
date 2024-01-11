<?php

require('./config/config.php');

echo "<pre>";
print_r(UserDAO::findAll());
print_r(UserDAO::findById("mario"));

$usuario = new User('54', sha1('pepi'), 'pepi', '2024-01-11', "in");
UserDAO::insert($usuario);
    ?>