<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rallye Vidéo</title>
</head>

<body>
    <h1>Rallye</h1>

    <!-- formulaire d'inscription sur le site -->

    <form method="POST" action="inscription.php">
        <label for="nom">username</label>
        <input type="text" name="username" id="username" required>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" required>
        <label for="mdp2">Confirmez le mot de passe</label>
        <input type="password" name="mdp2" id="mdp2" required>
        <input type="submit" value="S'inscrire">
    </form>

    <?php
    require_once('connexion_db.php');
    session_start();
    if (isset($_POST['username']) && isset($_POST['mdp']) && isset($_POST['mdp2'])) {
        $username = $_POST['username'];
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];
        if ($username == "SELECT * FROM rallyevideo_users WHERE username = '$username'") {
            echo 'Ce nom d\'utilisateur est déjà pris';
        }
        else {
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            $requete = "INSERT INTO rallyevideo_users (username, password) VALUES ('$username', '$mdp')";
            $resultat = mysqli_query($CONNEXION, $requete);
            if ($resultat) {
                echo 'Inscription réussie';
                echo '<a href="index.php">Accueil</a>';
                $_SESSION['username'] = $username;
                $_SESSION['mdp'] = $mdp;
            } else {
                echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
            }
        }
    }
    ?>

</body>

</html>