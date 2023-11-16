<?php
include("./components/session-start.php");
require_once "session-verif.php";
include("./components/header.php");
?>

<body>


    <main>
        <div class="title">
            <h1>Tous les réalisations</h1>
        </div>

        <?php $scan = scandir("./uploads");
        foreach ($scan as $key => $value) {
            if ($value != "." && $value != "..") {
                echo "<div class='realisation'>";
                echo "<h2>" . $value . "</h2>";
                echo "<video controls src='./uploads/" . $value . "'></video>";
                echo "</div>";
            }
        } ?>






    </main>
</body>


<?php
include("./components/footer.php");
?>