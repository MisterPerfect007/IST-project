<?php 
    header('Access-Control-Allow-Origin: *');
    include_once("../DB-connection.php");

    $con = connectDB();

    //Take the informations 
    $nom = $_POST["nom"];
    $prenoms = $_POST["prenoms"];
    $date_naissance = $_POST["date_naissance"];
    $genre = $_POST["genre"];
    $type_bac = $_POST["type_bac"];
    $maths_classe = $_POST["maths_classe"];
    $physique_classe = $_POST["physique_classe"];
    $svt_classe = $_POST["svt_classe"];
    $maths_bac = $_POST["maths_bac"];
    $physique_bac = $_POST["physique_bac"];
    $svt_bac = $_POST["svt_bac"];
    $pays = $_POST["pays"];
    $quartier = $_POST["quartier"];
    $lycee = $_POST["lycee"];
    // //Store informations in the DB
    $sql_req = "INSERT INTO `ETUDIANT_TEST` (nom, prenoms, date_naissance, genre, type_bac, maths_classe, physique_classe, svt_classe, maths_bac, physique_bac, svt_bac, pays, quartier, lycee) VALUES ('$nom', '$prenoms', '$date_naissance', '$genre', '$type_bac', '$maths_classe', '$physique_classe', '$svt_classe', '$maths_bac', '$physique_bac', '$svt_bac', '$pays', '$quartier', '$lycee')";
    
    if(mysqli_query($con, $sql_req)) {
        echo ("finished");
    }
    // if(!mysqli_query($con, $sql_req)) echo "failed";
    mysqli_close($con);
    
    ?>