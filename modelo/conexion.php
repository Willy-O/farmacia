<?php

require_once 'config.php';

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
} 


//$conexion = pg_connect($cadena) or die ("error".pg_last_error());

