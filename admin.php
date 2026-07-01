<?php
session_start();

if (!isset($_SESSION['lietotajvards']) || $_SESSION['loma'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Admin panelis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Admin panelis</h1>

<p>Sveiks, <?= htmlspecialchars($_SESSION['lietotajvards']) ?>! Šī lapa ir pieejama tikai administratoriem.</p>

<a href="index.php">← Atpakaļ</a>

</body>
</html>
