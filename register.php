<?php
require_once 'db.php';
$conn = getConn();
require_once 'messages.php';

?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Reģistrācija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Reģistrēties</h1>


 
<form method="POST">
    <label>Lietotājvārds<br>
        <input type="text" name="lietotajvards" placeholder="Ievadi savu lietotājvārdu">
    </label><br><br>
    <label>Parole<br>
        <input type="password" name="parole" placeholder="Ievadi savu paroli"></input>
    </label><br><br>
     <label>Atkārto paroli<br>
        <input type="password" name="parole_salidzinasana" placeholder="Ievadi savu paroli"></input>
    </label><br><br>
    <button type="submit">Reģistrēties</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lietotajvards = trim($_POST["lietotajvards"] ?? '');
    $parole = trim($_POST["parole"] ?? '');
    $parole_salidzinasana = trim($_POST["parole_salidzinasana"]??'');

    if (empty($lietotajvards)) {
        $message = "<p class='error'>" . $messages['error_lietotajvards'] . "</p>";
    } elseif (empty($parole)) {
        $message = "<p class='error'>" . $messages['error_parole'] . "</p>";
    } elseif (strlen($lietotajvards) > 20) {
        $message = "<p class='error'>" . $messages['error_lietotajvards_length'] . "</p>";
    } elseif (strlen($parole) > 30) {
        $message = "<p class='error'>" . $messages['error_parole_length'] . "</p>";

    } elseif ($parole != $parole_salidzinasana) { $message = "<p class='error'>" . $messages ['error_parole_nesakrit'] . "</p>";

    } else {
        $parole_hash = password_hash($parole, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO lietotaji (lietotajvards, parole_hash, loma) VALUES (?, ?, 'user')");
        $stmt->bind_param("ss", $lietotajvards, $parole_hash);
        if ($stmt->execute()) {
            $message = "<p class='success'>" . $messages ['success_registracija'] . "</p>";
        } elseif ($conn->errno === 1062) {
            $message = "<p class='error'>" . $messages ['error_registracija_lietotajs'] . "</p>";
        } else {
            $message = "<p class='error'>" . $messages ['error_registracija'] . "</p>";
        }

        $stmt->close();
    }

    echo $message;
}