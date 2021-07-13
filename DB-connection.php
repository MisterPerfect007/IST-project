<?php


 	function connectDB() {
        $server="sql11.freemysqlhosting.net";
        $login="sql11424844";
        $pass="F5CEjJWSNf";
        $db_name = "sql11424844";

        // $server="localhost";
        // $login="root";
        // $pass="";
        // $db_name = "vrmmONs08e";
    
        $con = mysqli_connect($server, $login, $pass, $db_name);
        
        if ($con){
            echo "yes";
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