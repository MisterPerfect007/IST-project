<?php

    include('functions.php');

    $new_user= new Functions();

    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['pseudo']) AND isset($_POST['statut']) AND isset($_POST['email']) AND empty($_POST['nom']) AND empty($_POST['prenom']) AND empty($_POST['pseudo']) AND empty($_POST['statut']) AND empty($_POST['email'])){


        $name=$_POST['nom'];
        $surname=$_POST['prenom'];
        $pseudo=$_POST['pseudo'];
        $statut=$_POST['statut'];
        $email=$_POST['email'];

       $new_user->register_new_user($name,$surname,$pseudo,$statut,$email);

    }




?>