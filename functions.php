
<?php


	
 
 	
 	function verify_user_identification($pseudo,$email){
 	
 		
 		
 		$search= $connection ->prepare("SELECT * FROM Utilisateurs");
 		$search->execute();
 		$test=0;
 		
 		while($data = $search->fetch()){
 		  
 		  $verif_pseudo= $data['pseudoUtilisateur'];
 		  $verif_email= $data ['emailUtilisateur'];
 		  
 		
 		  
 		  if ($verif_pseudo==$pseudo AND $verif_email==$email){
 		  	$test=1;
 		  	break;
 		  }
 		 
 		
 		}
 	     return $test;
 	
 	}
 
 	
 	
 	function register_new_user($name,$surname,$pseudo,$statut,$email){
 	
		include('DB-connection.php');
 	
 	
 		$register= $connection->prepare("INSERT INTO Utilisateurs(nomUtilisateur,prenomUtilisateur,emailUtilisateur,pseudoUtilisateur,statutUtilisateur) VALUES (:names,:surname,:email,:pseudo,:statut)");
 		
 		$register->bindParam(":name",$name);
 		$register->bindParam(":surname",$surname);
 		$register->bindParam(":pseudo",$pseudo);
 		$register->bindParam(":statut",$statut);
 		$register->bindParam(":email",$email);
 		
 		$register->execute();
 		
 		
 		
 	
 	
 	}
 	
 	
 	
 	function personnality(){
 	
		include('DB-connection.php');
 		
 		$personnalite= array(
 		
 		"forces"=>
 			array(
 				"sanguin"=>array(),
 				"colerique"=>array(),
 				"melancolique"=>array(),
 				"flegmatique"=>array()
 				),
 		
 		
 		"faiblesses"=>
 			array(
 				"sanguin"=>array(),
 				"colerique"=>array(),
 				"melancolique"=>array(),
 				"flegmatique"=>array()
 			)
 		);

		$qualifs_sanguin_force= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=1 AND idPersonnalite=1");
		$qualifs_colerique_force= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=1 AND idPersonnalite=2");
		$qualifs_melancolique_force= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=1 AND idPersonnalite=3");
		$qualifs_flegmatique_force= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=1 AND idPersonnalite=4");
 	

		$qualifs_sanguin_faiblesse= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=0 AND idPersonnalite=1");
		$qualifs_colerique_faiblesse= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=0 AND idPersonnalite=2");
		$qualifs_melancolique_faiblesse= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=0 AND idPersonnalite=3");
		$qualifs_flegmatique_faiblesse= $connection ->prepare("SELECT * FROM Qualificatifs WHERE force_faiblesse=0 AND idPersonnalite=4");
 	
		$qualifs_sanguin_force->execute();
		$qualifs_colerique_force->execute();
		$qualifs_melancolique_force->execute();
		$qualifs_flegmatique_force->execute();

		$qualifs_sanguin_faiblesse->execute();
		$qualifs_colerique_faiblesse->execute();
		$qualifs_melancolique_faiblesse->execute();
		$qualifs_flegmatique_faiblesse->execute();


		while($data= $qualifs_sanguin_force->fetch()){

			$personnalite['forces']['sanguin'][]=$data['nomQualificatif'];

		}
		while($data= $qualifs_colerique_force->fetch()){

			$personnalite['forces']['colerique'][]=$data['nomQualificatif'];

		}
		while($data= $qualifs_melancolique_force->fetch()){

			$personnalite['forces']['melancolique'][]=$data['nomQualificatif'];

		}
		while($data= $qualifs_flegmatique_force->fetch()){

			$personnalite['forces']['flegmatique'][]=$data['nomQualificatif'];

		}


		while($data= $qualifs_sanguin_faiblesse->fetch()){

			$personnalite['faiblesses']['sanguin'][]=$data['nomQualificatif'];

		}

		while($data= $qualifs_colerique_faiblesse->fetch()){

			$personnalite['faiblesses']['colerique'][]=$data['nomQualificatif'];

		}

		while($data= $qualifs_melancolique_faiblesse->fetch()){

			$personnalite['faiblesses']['melancolique'][]=$data['nomQualificatif'];

		}

		while($data= $qualifs_flegmatique_faiblesse->fetch()){

			$personnalite['faiblesses']['flegmatique'][]=$data['nomQualificatif'];

		}
 	
 	
 	//creation du fichier json
 	$json= json_encode($personnalite);
 	
 	$fichier= file_put_contents('fichier.json',$json);
 	
 	echo "<pre>";
	 print_r($personnalite);
	 echo "</pre>";
 	
 	
 	}
	
	function fetchData() {
		require_once('DB-connection.php');
		$con = connectDB();
		$sql = "SELECT nomQualificatif, force_faiblesse, idPersonnalite, `description` FROM Qualificatifs";
		$result = mysqli_query($con, $sql);

		$result_json = array(
			'forces' => array(
					
			),
			'faiblesses' => array()
	);

		while($row = mysqli_fetch_assoc($result)) {
			echo "ok";
			if($row['force_faiblesse'] == 1){
				$result_json['forces'][] = $row;
			}
			else {
				$result_json['faiblesses'][] = $row;
			}
		}
		echo ($result_json);
		// echo '<pre>';
		echo "function fetchData\n";
		return structureData($result_json);
		// echo '</pre>';
	}
 	
 
 
 
	function structureData($result_json){
		$final_r = array(
			'forces' => array(
			),
			'faiblesses' => array()
		);
		$n_r = array(
			'forces' => array(
			),
			'faiblesses' => array()
		);
		for($i = 0; $i < count($result_json['forces']); $i++){
			//force
			array_push($final_r['forces'], $result_json['forces'][$i], $result_json['forces'][$i+1], $result_json['forces'][$i+2], $result_json['forces'][$i+3]);

			$n_r['forces'][] = $final_r['forces'];
			$final_r['forces'] = [];
			//faiblesses
			array_push($final_r['faiblesses'], $result_json['faiblesses'][$i], $result_json['faiblesses'][$i+1], $result_json['faiblesses'][$i+2], $result_json['faiblesses'][$i+3]);

			$n_r['faiblesses'][] = $final_r['faiblesses'];
			$final_r['faiblesses'] = [];
			$i = $i+3;
		}
		return $n_r;
	}



?>
