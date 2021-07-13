<?php 
    header('Access-Control-Allow-Origin: *');
    include_once("../DB-connection.php");

    $con = connectDB();

    //Take the informations 
    $nom = strval($_POST["nom"]);
    $prenoms = strval($_POST["prenoms"]);
    // $date_naissance = $_POST["date_naissance"];
    $genre = strval($_POST["genre"]);
    $numero = strval($_POST["numero"]);
    $type_bac = strval($_POST["type_bac"]);
    $annee_bac = strval($_POST["annee_bac"]);
    // $maths_classe = strval($_POST["maths_classe"]);
    // $physique_classe = strval($_POST["physique_classe"]);
    // $svt_classe = strval($_POST["svt_classe"]);
    // $maths_bac = strval($_POST["maths_bac"]);
    // $physique_bac = strval($_POST["physique_bac"]);
    // $svt_bac = strval($_POST["svt_bac"]);
    $pays = strval($_POST["pays"]);
    $quartier = strval($_POST["quartier"]);
    $lycee = strval($_POST["lycee"]);
    // //Store informations in the DB
    $sql_req = "INSERT INTO `ETUDIANT_TEST` (nom, prenoms, genre, numero, type_bac, annee_bac, pays, quartier, lycee) VALUES ('$nom', '$prenoms', '$genre', '$numero', '$type_bac', '$annee_bac', '$pays', '$quartier', '$lycee')";
    
    if(mysqli_query($con, $sql_req)) {
        echo ("finished");
    }else echo "no";
    // if(!mysqli_query($con, $sql_req)) echo "failed";
    mysqli_close($con);
    
    ?>