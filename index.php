<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    require_once('functions.php');

    // echo 'bonjour';
    echo jsonencode(fetchData());

?>