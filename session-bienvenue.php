<?php
include("./components/session-start.php");
require_once "session-verif.php";
include("./components/header.php");

?>

<body>

    <?php

    $iduser = intval($_SESSION["iduser"]);
    echo $iduser;
    ?>
    <h1>Mon profil</h1>
    <div class="center">
        <h2>Bonjour <?= $_SESSION["prenom"] ?> <?= $_SESSION["nom"] ?></h2>
    </div>
    <div>
        <div>

            <!-- Si l'utilisateur à aucune proposition = -->
            <?php
            $requetedansequipe = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user_has_team INNER JOIN rallyevideo_team ON rallyevideo_user_has_team.team_idteam = rallyevideo_team.idteam WHERE user_iduser = $iduser AND equipe = 1");

            if (mysqli_num_rows($requetedansequipe) == 0) {
                $equipecree = 0;
                $requetecard = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user_has_team WHERE user_iduser = '$iduser'");
                $requeteequipe = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_team WHERE idcreateur = '$iduser'");
                if (mysqli_fetch_row($requeteequipe) == 0) {
                    $equipecree = 0;
                    if (mysqli_fetch_row($requetecard) == 0) {
            ?>
            <div class="center-div noprop">
                <p>Tu n'as reçu aucune proposition d'équipe</p>
            </div>
            <?php
                    } else {
                    ?>
            <!-- Sinon = -->

            <?php
                        $requetenomteam = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_team INNER JOIN rallyevideo_user ON rallyevideo_team.idcreateur = rallyevideo_user.iduser INNER JOIN rallyevideo_user_has_team ON rallyevideo_team.idteam = rallyevideo_user_has_team.team_idteam WHERE rallyevideo_user_has_team.user_iduser = '$iduser'");
                        //if (!$requetenomteam) {
                        if (mysqli_num_rows($requetenomteam) == 0) {
                            echo 'Erreur1';
                        } else {
                            while ($rownomteam = mysqli_fetch_assoc($requetenomteam)) {
                                $idteamcard = $rownomteam["idteam"];
                        ?>
            <div class="center-div team-card">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path
                            d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                        </path>
                    </svg>
                </div>
                <div class="card-text">
                    <p><?= $rownomteam["prenom"] . " " . $rownomteam["nom"] ?> te propose de rejoindre son équipe
                        <br>
                        <?= $rownomteam["nom_equipe"] ?> avec
                    </p>
                    <ul>
                        <?php
                                            $requetemembres = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user_has_team INNER JOIN rallyevideo_user ON rallyevideo_user_has_team.user_iduser = rallyevideo_user.iduser WHERE team_idteam = '$idteamcard'");
                                            if (mysqli_num_rows($requetemembres) == 0) {
                                                echo 'Erreur2';
                                            } else {
                                                while ($rowmembres = mysqli_fetch_assoc($requetemembres)) {
                                            ?>
                        <li><?= $rowmembres["prenom"] . "<br> " . $rowmembres["nom"] ?></li>
                        <?php
                                                }
                                            }
                                            ?>
                    </ul>
                </div>
                <div class="card-buttons">
                    <a href="buttons.php?action=1&idteam=<?= $rownomteam["idteam"] ?>"
                        class="button-main btn-card">Accepter</a>
                    <a href="buttons.php?action=0&idteam=<?= $rownomteam["idteam"] ?>"
                        class="button-main-variant btn-card">Decliner</a>
                </div>
            </div>
        </div>
        <?php
                            }
                        }
                    }
?>
        <?php
                } else {
                    $equipecree = 1;
                    $requetenom = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_team WHERE idcreateur = '$iduser'");


                    if (mysqli_num_rows($requetenom) == 0) {
                        echo 'Erreur3';
                    } else {
                        $row = mysqli_fetch_assoc($requetenom);
?>

        <h2 style="text-align: center;">Tu as déjà crée l'équipe <?= $row["nom_equipe"]; ?>.</h2>

        <div class="center-div">

            <ul>
                <h2>Voici les membres de ton équipe :</h2>
                <?php
                        $idteam = $row["idteam"];
                        $requetemembres = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user_has_team INNER JOIN rallyevideo_user ON rallyevideo_user_has_team.user_iduser = rallyevideo_user.iduser WHERE team_idteam = '$idteam' AND equipe = 1");
                        if (mysqli_num_rows($requetemembres) == 0) {
                            echo "<p>Aucun membre n'a encore rejoint ton équipe</p>";
                        } else {
                            while ($rowmembres = mysqli_fetch_assoc($requetemembres)) {
                                echo "<li>" . $rowmembres["prenom"] . " " . $rowmembres["nom"] . "</li>";
                            }
                        }
            ?>
                <h2>Voici les membres invités</h2>
                <?php
                        $requetesinvitations = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user_has_team INNER JOIN rallyevideo_user ON rallyevideo_user_has_team.user_iduser = rallyevideo_user.iduser WHERE team_idteam = '$idteam' AND equipe = 0");
                        if (mysqli_num_rows($requetesinvitations) == 0) {
                            echo '<p>Aucun membre n\'a encore été invité</p>';
                        } else {
                            while ($rowinvitations = mysqli_fetch_assoc($requetesinvitations)) {
                                echo "<li>" . $rowinvitations["prenom"] . " " . $rowinvitations["nom"] . "</li>";
                            }
                        }

            ?>

            </ul>
            <div class="center-div">
                <a href="delete-team.php" class="button-main-variant petit red"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre équipe ?')">Supprimer
                    l'équipe</a>
                <?php

                        $sqldepot = mysqli_query($CONNEXION, "SELECT depot FROM rallyevideo_team WHERE idcreateur = '$iduser'");
                        if (mysqli_num_rows($sqldepot) == 0) {
                            echo 'Erreur';
                        } else {
                            while ($rowdepot = mysqli_fetch_assoc($sqldepot)) {
                                if ($rowdepot['depot'] == 0) {

            ?>
                <a href="upload.php" class="button-main-variant petit">Déposer mon film</a>

                <?php
                                } else {
                                }
                            }
                        }
            ?>
            </div>


            <?php
                    }
                }
            } else {
                $equipecree = 1;
                while ($rownomequipedeja = mysqli_fetch_assoc($requetedansequipe)) {
    ?>
            <h2 style="text-align: center;">Tu es déjà dans l'équipe <?= $rownomequipedeja["nom_equipe"]; ?></h2>
            <?php
                }
            }
?>

            <!-- Si aucune équipe = -->
            <?php
if ($equipecree == 0) {
?>
            <div class="center-div">
                <a href="create-team.php" class="button-main">Créer une équipe</a>
            </div>
            <?php
} else {
}
?>
        </div>



        <?php include("./components/footer.php");
    ?>
</body>