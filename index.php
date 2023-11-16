<?php
include("./components/session-start.php");
include("./components/header.php");
?>

<body>


    <main class="main-index">
        <div class="left">
            <img src="./assets/camera_accueil.svg" alt="logo camera">

        </div>
        <div class="right">
            <h1 class="titre-index">Le Rallye Vidéo<br> revient !</h1>
            </h1>
            <!-- décompte -->
            <h2 id="countdown" class="countdown-container">Loading...</h2>
            <button id="decouvrir"><a href="evenement.php">Découvrir</a></button>

        </div>
    </main>



</body>
<?php
include("./components/footer.php")
?>
<script src="./js/countdown.js"></script>

</html>