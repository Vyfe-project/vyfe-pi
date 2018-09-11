<?php

//echo SAlut;
try
{    //dbname=vyfe_pi'vyfepi'  'vyfepi'
 = new PDO('mysql:host=localhost;dbname=vyfepi;charset=utf8', 'root', 'azerty1234');
}
catch (Exception )
{
        die('Erreur : ' . ->getMessage());
}

if (isset([action]) && [action]==create-session) {
 = ->prepare('INSERT INTO session(name) VALUES(:name)');
->execute(array('name' => [name]));
header(Status: 200 OK, false, 200);
}

if (isset([action]) && [action]==create-tag) {
         = ->prepare('INSERT INTO tag(name,color,leftOffset,righOffset) VALUES(:name, :color, :leftOffset, :righOffset)');
        ->execute(array(
//add properties
'name' => [name],
'color' => [color],
'leftOffset' => [leftOffset],
'righOffset' => [righOffset]));
        header(Status: 200 OK, false, 200);
}


else {
header(Status:400 BAD REQUEST, false, 400);
http_response_code(400);
die();
}
