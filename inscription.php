<?php
	require_once('../controllers/ClientController.php');
	require_once('../models/Client.php');
	$ncin=$_POST['ncin'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$telephone=$_POST['tel'];
	$client=new Client($ncin,$nom,$prenom,$telephone);
	$clientCtr=new ClientController();


	$res=$clientCtr->insert($client);
	//echo $client->getNcin();

	if($res==true){
		header('Location:index.php');
	}


?>