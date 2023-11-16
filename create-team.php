<?php

include("./components/session-start.php");
require_once "session-verif.php";
include("./components/header.php");




use PHPMailer\PHPMailer\PHPMailer;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer mon équipe</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php

    $iduser =  intval($_SESSION["iduser"]);
    $sql = "SELECT iduser, nom, prenom FROM rallyevideo_user WHERE NOT iduser = '$iduser'";
    $result = $CONNEXION->query($sql);
    $row = $result->fetch_assoc();
    $nom = $row["nom"];
    $prenom = $row["prenom"];

    ?>
    <h1>Créer une équipe</h1>

    <?php
    $requetecheck = mysqli_query($CONNEXION, "SELECT * from rallyevideo_team WHERE idcreateur = $iduser");
    if (mysqli_num_rows($requetecheck) == 0) {
    ?>
        <main>
            <div>
                <form action="" method="post">
                    <label for="nom">Nom de l'équipe</label>
                    <input type="text" name="nom" id="nom" required>
                    <label for="membre">Membres (max:8)</label>

                    <select class="js-example-basic-multiple js-states form-control" name="membres[]" multiple="multiple">
                        <?php foreach ($result as $row) {
                            echo "<option data-selected='false' value='" . $row["iduser"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                        } ?>
                    </select>
                    <input type="submit" value="Créer l'équipe" name="button">
                </form>
            </div>
            <div>

                <a id=deconnexion href="./session-bienvenue.php">Retour en arrière</a>
            </div>
        </main>

    <?php
    } else {
    ?>
        <h2 style="text-align: center;">Vous avez déjà créé une équipe.</h2>
    <?php
    }

    ?>
</body>

<?php
require_once('connexion_db.php');
if (isset($_POST['button'])) {
    if (isset($_POST['nom']) && isset($_POST['membres'])) {
        $nom = $_POST['nom'];
        $membres = $_POST['membres'];
        $requeteequipe = "INSERT INTO rallyevideo_team VALUES(NULL, '$nom', 0, '$iduser')";
        $creationteam = mysqli_query($CONNEXION, $requeteequipe);
        $lastequipe = "SELECT idteam FROM rallyevideo_team ORDER BY idteam DESC LIMIT 1";
        $lastequiperesult = mysqli_query($CONNEXION, $lastequipe);
        $resultequipe = mysqli_fetch_assoc($lastequiperesult);
        $idequipe = $resultequipe['idteam'];
        foreach ($membres as $value) {
            $requeteuserteam = "INSERT INTO rallyevideo_user_has_team VALUES('$value', '$idequipe', 0)";
            $sqlquery = mysqli_query($CONNEXION, $requeteuserteam);

            $infosuser = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user WHERE iduser = '$value'");
            $rowuser = mysqli_fetch_assoc($infosuser);

            $infocreateur = mysqli_query($CONNEXION, "SELECT * FROM rallyevideo_user WHERE iduser = '$iduser'");
            $rowcreateur = mysqli_fetch_assoc($infocreateur);

            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'guprojetmmi@gmail.com';
            $mail->Password = 'zskgpnbfqqkuinyu';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->isHTML(true);

            $mail->setFrom('guprojetmmi@gmail.com');

            $mail->addAddress($rowuser['email']);
            $mail->isHTML(true);

            $message = file_get_contents('mail/index.html');
            $message = str_replace('[idcreateur]', $rowcreateur['prenom'] . " " . $rowcreateur['nom'], $message);
            $message = str_replace('[nomequipe]', $nom, $message);


            $mail->Subject = "Nouvel proposition d'équipe !";

            $mail->MsgHTML($message);
            $mail->AddEmbeddedImage('mail/images/logo.png', 'logo');

            $mail->send();
        }
        unset($value);
?>
        <script type="text/javascript">
            window.location.href = 'session-bienvenue.php';
        </script>
<?php
    }
}
?>


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            maximumSelectionLength: '7'
        });
    });
</script>

</html>