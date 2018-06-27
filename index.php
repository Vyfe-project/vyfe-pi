<?php
include 'head.php';
?>

    <form method="POST" action="student.php" id="join-session">
        <div class="form-group">
            <label for="firstname">Enter your name and select a session to join</label>
            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter firstname">

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

$response = $bdd->query('SELECT * FROM session');

while ($donnees = $response->fetch())
{
	echo '<div class="form-check">';
	echo '<input type="radio" name="sess-id" id="session" class="form-check-input" value=' . $donnees['id']  . '>';
	echo '<label class="form-check-label" for="session">' . $donnees['name'] . '</label>';

	echo '</div>';
}

?>

            <input type="hidden" name="client-time" id="client-time">
            <input type="submit" value="join">
        </div>
    </form>

<script>
    $('#join-session').submit(function(ev) {
        ev.preventDefault();
        console.log($.now());
	$("#client-time").val($.now);
        this.submit();
    });
</script>

<?php
include 'foot.php';
?>
