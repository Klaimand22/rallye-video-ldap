<?php
include("./components/header.php");
require_once "session-verif.php";
require_once('connexion_db.php');
$iduser = $_SESSION["iduser"];

$requete = mysqli_query($CONNEXION, "DELETE FROM rallyevideo_team WHERE idcreateur = '$iduser'");
if ($requete) {


?>

    <script>
        window.location.href = "session-bienvenue.php";
    </script>
<?php

} else {
    echo 'Erreur';
}

?>