<?php
include("./components/header.php");
require_once('connexion_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/admin.css">

    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

    <h1>Membres de l'équipe <?php echo htmlspecialchars($_GET["nom_equipe"]); ?></h1>

    <main>
        <div>
            <?php
            require_once('connexion_db.php');
            $requetecrea = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_team INNER JOIN rallyevideo_user ON rallyevideo_team.idcreateur = rallyevideo_user.iduser");
            if (mysqli_num_rows($requetecrea) == 0) {
                echo "Erreur";
            } else {
                $row = mysqli_fetch_assoc($requetecrea);
            }
            ?>
            <h2>Équipe créé par : <?= $row["prenom"] ?> <?= $row["nom"] ?></h2>
        </div>
        <div>
            <form method="POST" action="ajouter-membre.php">
                <input type="hidden" name="nom_equipe" value="<?php echo htmlspecialchars($_GET["nom_equipe"]); ?>">
                <input type="submit" value="Ajouter un membre">
            </form>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // SUPPRESSION D'UN MEMBRE DE L'EQUIPE
                    if (isset($_POST['supprimer'])) {
                        if ((isset($_POST['supprimer'])) && ($_POST['supprimer'] != "")) {

                            try {
                                $CONNEXION = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $CONNEXION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sql = "DELETE FROM rallyevideo_user_has_team WHERE user_iduser = :iduser";

                                $stmt = $CONNEXION->prepare($sql);
                                $stmt->bindParam(':iduser', $_POST["supprimer"]);
                                $stmt->execute();
                            } catch (PDOException $e) {
                                echo "Erreur : " . $e->getMessage();
                            }

                            echo "Membres supprimées avec succès.";
                        } else {
                            echo "Suppression annulée.";
                        }
                    }

                    // AFFICHAGE DES MEMBRES DE L'EQUIPE

                    try {
                        $CONNEXION = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $CONNEXION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $nom_equipe = isset($_GET["nom_equipe"]) ? $_GET["nom_equipe"] : "";

                        $sql = "SELECT u.iduser, u.nom, u.prenom
                                FROM rallyevideo_user u
                                JOIN rallyevideo_user_has_team uht ON u.iduser = uht.user_iduser
                                JOIN rallyevideo_team t ON uht.team_idteam = t.idteam
                                WHERE t.nom_equipe = :nom_equipe";


                        $stmt = $CONNEXION->prepare($sql);
                        $stmt->bindParam(':nom_equipe', $nom_equipe);
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["prenom"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["nom"]) . "</td>";
                    ?>
                            <td>
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce membre de l\'équipe ?');" class="supprimer">
                                    <input type="hidden" name="supprimer" value="<?php echo htmlspecialchars($row["iduser"]); ?>">
                                    <input type="submit" value="Supprimer" class="supprimer">
                                </form>
                            </td>
                            </tr>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                    ?>

                </tbody>
            </table>

        </div>

    </main>

    <?php include("./components/footer.php"); ?>
</body>

</html>