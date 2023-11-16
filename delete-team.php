<?php
include("./components/session-start.php");
require_once "session-verif.php";
include("./components/header.php");

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