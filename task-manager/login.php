<?php
session_start();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$message = 'Кіру жүйесі MySQL дерекқорын қосқаннан кейін жұмыс істейді.';
}
?>

<!DOCTYPE html>

<html lang="kk">
<head>
<meta charset="UTF-8">
<title>Жүйеге кіру</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
<h2>Жүйеге кіру</h2>
<p><?= htmlspecialchars($message) ?></p>

<form method="post">
    <p><input type="email" name="email" placeholder="Email" required></p>
    <p><input type="password" name="password" placeholder="Құпиясөз" required></p>
    <button type="submit">Кіру</button>
</form>

<p><a href="register.php">Тіркелу</a></p>
<a href="index.php">Басты бет</a>


</main>
</body>
</html>
