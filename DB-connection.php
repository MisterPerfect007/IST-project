<?php


 	function connectDB() {
        $server="173.214.162.58";
        $login="st11917_perfect2";
        $pass="BiggerThanLife";
        $db_name = "st11917_ist-success";

        // $server="localhost";
        // $login="root";
        // $pass="";
        // $db_name = "vrmmONs08e";
        $con = mysqli_connect($server, $login, $pass, $db_name);
        // mysqli_query($con, "SET NAMES 'utf8'");
        if ($con){
            mysqli_set_charset($con,"utf8");
            // echo "Good connection";
            return $con;
        }else {
            die("Erreur de connection à la base de donnée : ".mysqli_connect_error());
        }
    }	
    // try{
    // $connection = new PDO("mysql:host=$server;dbname=vrmmONs08e",$login,$pass);
    // $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // }
    // catch(PDOException $e){
    
    // echo "DataBase connection Error : ".$e->getMessage();
    
    // }



?>