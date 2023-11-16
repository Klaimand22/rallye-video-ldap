<?php

require_once('../connexion_db.php');
$error = isset($_GET["error"]) ? $_GET["error"] : "";

$ds = ldap_connect("ldaps://ldap-bourget.univ-savoie.fr"); // doit etre un serveur LDAP valide!
$iut = 0;
$login = $_SERVER['REMOTE_USER'];
if ($ds) {
    $sr = ldap_search($ds, 'ou=people, ou=uds, dc=agalan, dc=org', "uid=$login");
    $info = ldap_get_entries($ds, $sr);
    $info = $info[0];
    $nom = $info['sn'][0];
    $prenom = $info['givenname'][0];
    //$prenom=[]
    $mail = $info['mail'][0];


    //Verifier si l'utilisateur existe dans la BDD
    $sql = "SELECT iduser, role_idrole FROM rallyevideo_user WHERE login = '$login'";
    $result = $CONNEXION->query($sql);
    //si l'utilisateur existe dans la BDD

    if ($result->num_rows > 0) {
        // Utilisateur trouvé
        $row = $result->fetch_assoc();
        $role_id = $row["role_idrole"];

        // Récupérer les informations de l'utilisateur
        $sql = "SELECT nom, prenom, iduser, role_idrole FROM rallyevideo_user WHERE login = '$login'";
        $result = $CONNEXION->query($sql);
        $row = $result->fetch_assoc();
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $iduser = $row["iduser"];
        $role_id = $row["role_idrole"];

        // Démarrer la session avec les informations de l'utilisateur

        session_start();

        $_SESSION["login"] = $login;
        $_SESSION["iduser"] = $iduser;
        $_SESSION["nom"] = $nom;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["role"] = ($role_id == 1) ? "membre" : "admin"; // 1 = membre, 2 = admin
        $_SESSION["logged"] = true;
        echo "Utilisateur trouvé";
        header("Location: ../session-bienvenue.php");
    }


    // si l'utilisateur n'existe pas dans la BDD
    if ($result->num_rows == 0) {
        //creation de l'utilisateur dans la BDD
        echo "Utilisateur non trouvé";
        $sql = "INSERT INTO rallyevideo_user (nom, prenom, login, email, role_idrole) VALUES ('$nom', '$prenom', '$login', '$mail', 1)";
        $result = $CONNEXION->query($sql);
        //reloader la page
        sleep(1);
        header("Location: index.php");
    }
} else {
    echo "Impossible de se connecter au serveur LDAP";
}


echo $nom;
echo $prenom;
echo $mail;
echo $login;









/* <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session </title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include_once './components/header.php' ?>
<div class="title">
    <h1>Connexion</h1>
</div>
<form action="session-login.php" method="post">
    <input type="email" name="login" placeholder="exemple@univ-smb.fr">
    <input type="password" name="mdp" placeholder="Votre mot de passe">
    <input type="submit" value="Se connecter">
</form>

</body>

<?php
switch ($error) {
    case 1:
        echo "<p style='color:red'>Veuillez saisir votre login</p>";
        break;
    case 2:
        echo "<p style='color:red'>Veuillez saisir un mot de passe correct</p>";
        break;
    case 3:
        echo "<p style='color:red'>Veuillez vous connecter</p>";
        break;
}
*/