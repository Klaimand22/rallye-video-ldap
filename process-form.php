<?php
$data = $_FILES["file"];
$code = $data["error"];

if ($code !== UPLOAD_ERR_OK) {
    exit("Erreur d'upload");
}

$src = $data["tmp_name"];

$dest = __DIR__
        . "/uploads/"
        . $data["name"];

move_uploaded_file($src, $dest);

echo "Fichier envoyé!",
    "Taille :", $data["size"],
    "Type :", $data["type"];

?>