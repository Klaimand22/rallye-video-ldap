<?php
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] != true) {
    header("Location: ./session/index.php");
}
