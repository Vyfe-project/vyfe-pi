<?php

//echo "SAlut";
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=vyfepi;charset=utf8', 'root', 'azerty1234');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_GET["action"]) && $_GET["action"]=="create") {
	$req = $bdd->prepare('INSERT INTO session(name) VALUES(:name)');
	$req->execute(array('name' => $_GET["name"]));
	header("Status: 200 OK", false, 200);
}

else {
	header("Status:400 BAD REQUEST", false, 400);
	http_response_code(400);
	die();
}
