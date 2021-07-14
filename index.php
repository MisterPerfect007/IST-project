<?php

    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json");
    // header('Content-Type: application/json; charset=utf-8');
    // header('Content-Type: charset=utf-8');
    
    require_once('functions.php');

    
    fetchData();

?>