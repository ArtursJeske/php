<?php
session_start();
require_once 'db.php';
$conn = getConn();
require_once 'messages.php';

?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Login</h1>

<?php if (isset($_SESSION['lietotajvards'])): ?>
    <p>Sveiks, <?= htmlspecialchars($_SESSION['lietotajvards']) ?>! (loma: <?= htmlspecialchars($_SESSION['loma']) ?>)</p>
<?php endif; ?>

<form method="POST">
    <label>Lietotājvārds<br>
        <input type="text" name="lietotajvards" placeholder="Ievadi savu lietotājvārdu">
    </label><br><br>
    <label>Parole<br>
        <input type="password" name="parole" placeholder="Ievadi savu paroli"></input>
    </label><br><br>
    <button type="submit">Login</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lietotajvards = trim($_POST["lietotajvards"] ??'');
    $parole = trim($_POST["parole"] ?? '');

    $stmt = $conn->prepare("SELECT * FROM lietotaji WHERE lietotajvards = ?");
    $stmt ->bind_param("s", $lietotajvards);
    $stmt ->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($parole, $user['parole_hash'])) {
            $_SESSION['lietotajvards'] = $user['lietotajvards'];
            $_SESSION['loma'] = $user['loma'];
            $message = "<p class='success'>" . $messages ['success_login'] . "</p>";
    } else {
        $message = "<p class='error'>" . $messages ['error_login'] . "</p>";
    }

    $stmt->close();

    echo $message;
}
?>

</body>
</html>