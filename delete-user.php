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
} */
?>

<body>

    <h1 class="title">Liste des membres</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">email</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connexion_db.php');
                $sql = mysqli_query($CONNEXION, "SELECT iduser, nom, prenom, email, role_idrole FROM rallyevideo_user");
                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $user_id = $row["iduser"];
                        $nom = $row["nom"];
                        $prenom = $row["prenom"];
                        $email = $row["email"];
                        $role = $row["role_idrole"];
                ?>
                <tr>
                    <td><?= $nom ?></td>
                    <td><?= $prenom ?></td>
                    <td><?= $email ?></td>
                    <td><?php if ($role == 1) {
                                    echo "Membre";
                                } else {
                                    echo "Admin";
                                } ?></td>
                    <td>
                        <form action="user.php"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer <?= $prenom ?> <?= $nom ?> ?')"
                            method="post">
                            <input type="hidden" name="iduser" value="<?= $user_id ?>">
                            <input type="hidden" name="email" value="<?= $email ?>">
                            <input type="hidden" name="supprimer" value="supprimer" id="supprimer">
                            <input type="submit" value="supprimer" name="submit">
                        </form>
                        <form action="user.php" method="post"
                            onclick="return confirm('Êtes-vous sûr de vouloir ajouter <?= $prenom ?> <?= $nom ?> en tant qu\'admin ?')">
                            <input type="hidden" name="iduser" value="<?= $user_id ?>">
                            <input type="hidden" name="email" value="<?= $email ?>">
                            <input type="hidden" name="role" value="admin" id="admin">
                            <input type="submit" value="Ajouter les permissions admin" name="submit" id="admin">
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

        if (isset($_POST['submit']) && $_POST['supprimer'] == "supprimer") {
            $iduser = $_POST['iduser'];
            $email = $_POST['email'];
            $request = "DELETE FROM rallyevideo_user WHERE iduser = $iduser";
            $sql = mysqli_query($CONNEXION, $request);
            if ($sql) {
                echo "Membre supprimé";
        ?>
        <script>
        window.location.href = "delete-user.php";
        </script>
        <?php
            } else {
                echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
            }
        }

        if (isset($_POST['submit']) && $_POST['role'] == "admin") {
            $iduser = $_POST['iduser'];
            $email = $_POST['email'];
            $request = "UPDATE rallyevideo_user SET role_idrole = 2 WHERE iduser = $iduser";
            $sql = mysqli_query($CONNEXION, $request);
            if ($sql) {
                echo "Membre ajouté en tant qu'admin";
                $_SESSION["role"] = "admin";
            ?>
        <script>
        window.location.href = "delete-user.php";
        </script>
        <?php
            } else {
                echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
            }
        }
        ?>

</body>