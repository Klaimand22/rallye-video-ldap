<?php
session_start();
include_once("connexion_db.php");

$iduser = $_SESSION["iduser"];
$idteam = $_GET["idteam"];
$action = $_GET["action"];

if($action == 1){
    $requetteaccept = mysqli_query($CONNEXION, "UPDATE rallyevideo_user_has_team SET equipe = 1 WHERE user_iduser = '$iduser' AND team_idteam = '$idteam'");
    if($requetteaccept){
        header('location: session-bienvenue.php');
    }else {
        echo "Erreur contactez le webmaster";
    }
}else if($action == 0){
    $requettedeny = mysqli_query($CONNEXION, "DELETE FROM rallyevideo_user_has_team WHERE user_iduser = '$iduser' AND team_idteam = '$idteam'");
    if($requettedeny){
        header('location: session-bienvenue.php');
    }else {
        echo "Erreur contactez le webmaster";
    }
}







?>