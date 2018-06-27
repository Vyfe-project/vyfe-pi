<?php
include 'functions.php';
include 'head.php';
?>

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

if (isset($_POST["sess-id"]) && isset($_POST["firstname"]) && isset($_POST["client-time"])) {

	// Display session and firstname
	$req = $bdd->prepare('SELECT * FROM session WHERE session.id=:id');
	$req->execute(array('id' => $_POST["sess-id"]));
	$session = $req->fetch();
	echo '<div class="jumbotron" style="padding-bottom:10px;">';
	echo '<h1 class="display-4">'.$session['name'].'</h1>';
        echo '<p class="lead">Vous êtes connecté à '.$session['name'].' en tant qu\'observateur</p>';
        echo '<hr class="my-4">';
        echo '<p>Formateur : '.$session['author'].' <br> Observateur : '.$_POST["firstname"];
	
	// Synchronize
	$clientTime = $_POST["client-time"];
        $serverTime = microtime_int();
        $diff = $serverTime-$clientTime;
	echo "client time is ".$_POST["client-time"]." and server time is ".$serverTime." -- Diff = ".$diff."<br>";
        echo '</div>';
	$_SESSION['diff'] = $diff;
	
        // Fetch tags
        echo '<div class="btn-group-vertical" role="group" aria-label="Vertical button group"style="margin-left:20%; width:60%;">';
	$req = $bdd->query('SELECT * FROM tag');
	while ($tag = $req->fetch())
	{
		echo '<button type="button" id="tag'.$tag['id'].'" style="background-color:'.$tag['color'].'">'.$tag['label']."</button>";
	}
        echo '</div>';

} else {
	header("Location: index.php");
	die();
}

?>

<script type="text/javascript">
$('button').on('click',function(){
    console.log($(this));
});
</script>

<?php
include 'foot.php';
?>
