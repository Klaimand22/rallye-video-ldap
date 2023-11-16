<?php

include("./components/session-start.php");
require_once "session-verif.php";
include("./components/header.php");
/* if ($_SESSION["role"] != 'admin' || !isset($_SESSION["role"])) {
?>
<script>
window.location.href = "index.php";
</script>
<?php
}

 */
?>

<body>

    <h1 class="title">Liste des membres</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">email</th>
                    <th scope="col">Réinitialiser mot de passe</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connexion_db.php');
                $sql = mysqli_query($CONNEXION, "SELECT iduser, nom, prenom, email FROM rallyevideo_user");
                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $user_id = $row["iduser"];
                        $nom = $row["nom"];
                        $prenom = $row["prenom"];
                        $email = $row["email"];
                ?>
                        <tr>
                            <td><?= $nom ?></td>
                            <td><?= $prenom ?></td>
                            <td><?= $email ?></td>
                            <td>
                                <form action="send-mail.php" onclick="return confirm('Êtes-vous sûr de vouloir réinitialiser le mot de passe de <?= $prenom ?> <?= $nom ?> ?')" method="post">
                                    <input type="hidden" name="iduser" value="<?= $user_id ?>">
                                    <input type="hidden" name="email" value="<?= $email ?>">
                                    <input type="submit" value="réinitialiser mot de passe" name="submit">
                                </form>
                            </td>

                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <h2>Aucun membre.</h2>
                <?php
                }
                ?>
            </tbody>

        </table>

        <?php
        function randomPassword()
        {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 6; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }
        $new_mdp = randomPassword();
        $hash_mdp = hash("sha256", $new_mdp);
        echo "<h2>$new_mdp</h2>";

        if (isset($_POST['submit'])) {
            $iduser = $_POST['iduser'];
            $email = $_POST['email'];
            $request = "UPDATE rallyevideo_user SET password = '$hash_mdp' WHERE iduser = $iduser";
            $sql = mysqli_query($CONNEXION, $request);
            if ($sql) {
                echo 'Mot de passe réinitialisé';

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

                $mail->addAddress($email);
                $mail->isHTML(true);

                $message = file_get_contents('mail/mdp.html');
                $message = str_replace('[mdp]', $new_mdp, $message);


                $mail->Subject = "Ton nouveau mot de passe !";

                $mail->MsgHTML($message);
                $mail->AddEmbeddedImage('mail/images/logo.png', 'logo');

                $mail->send();
            } else {
                echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
            }
            echo $request;
        }
        ?>

</body>