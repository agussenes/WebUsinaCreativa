<?php
// Cargar las variables del .env
$env = parse_ini_file(__DIR__ . '/.env');
define('USUARIO_ENV', $env['USUARIO']);
define('PASSWORD_ENV', $env['PASSWORD']);
