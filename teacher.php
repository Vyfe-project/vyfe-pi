<?php

//echo SAlut;
try
{                                                        //change user
	       $bdd = new PDO('mysql:host=localhost;dbname=vyfe_pi;charset=utf8', 'vyfepi', 'vyfepi');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_GET["action"]) && $_GET["action"]=="create-session") {
	      $req = $bdd->prepare('INSERT INTO session(name) VALUES(:name)');
	      $req->execute(array('name' => $_GET["name"]));
	      header("Status: 200 OK", false, 200);
}

if (isset($_GET["action"]) && $_GET["action"]=="create-tag") {
        $req = $bdd->prepare('INSERT INTO tag(name,color,leftOffset,righOffset) VALUES(:name, :color, :leftOffset, :righOffset)');
        $req->execute(array(
         //add properties
        'name' => $_GET["name"],
        'color' => $_GET["color"],
        'leftOffset' => $_GET["leftOffset"],
        'righOffset' => $_GET["righOffset"]));
        header("Status: 200 OK", false, 200);
}

else {
	header("Status:400 BAD REQUEST", false, 400);
	http_response_code(400);
	die();
}
