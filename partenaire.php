<?php
include("./components/session-start.php");
require_once "session-verif.php";
include("./components/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partenaire</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/evenement-partenaire.css">
    <link rel="stylesheet" href="./css/footer.css">

</head>

<body>
    <?php include_once('./components/header.php') ?>
    <main>
        <div>
            <h1 class="title">Les partenaires</h1>
        </div>


        <div class="parent">
            <div class="div1"> <img src="./assets/MMI-Chambery-Noir.svg" alt="logo-partenaire-iut-chambery">
            </div>
            <div class="div2">
                <h2>MMI Chambéry</h2>
                <a href="https://mmi.univ-smb.fr/">mmi.univ-smb.fr</a>
            </div>
            <div class="div3"> <img src="./assets/sigma.svg" alt="logo-partenaire-sigma">
            </div>

            <div class="div4">
                <h2>Sigma France</h2>
                <a href="https://www.sigma.fr/">sigma.fr</a>
            </div>
            <div class="div5"> <img src="./assets/Logo IUT CHAMBERY.svg" alt="logo-partenaire-iut-chambery">
            </div>
            <div class="div6">
                <h2>IUT Chambéry</h2>
                <a href="https://iut-chy.univ-smb.fr/">iut-chy.univ-smb.fr</a>
            </div>

        </div>
    </main>



    <?php include_once('./components/footer.php') ?>
</body>

</html>