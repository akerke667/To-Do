<?php
session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)
&& strlen($password) >= 8) {
$message = 'Тіркелу деректері қабылданды. Дерекқор қосылғаннан кейін аккаунт сақталады.';
} else {
$message = 'Мәліметтерді дұрыс толтырыңыз. Құпиясөз кемінде 8 таңба болуы керек.';
}
}
?>

<!DOCTYPE html>

<html lang="kk">
<head>
<meta charset="UTF-8">
<title>Тіркелу</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
<h2>Тіркелу</h2>
<p><?= htmlspecialchars($message) ?></p>
<form method="post">
<p><input name="name" placeholder="Аты-жөніңіз" required></p>
<p><input type="email" name="email" placeholder="Email" required></p>
<p><input type="password" name="password" placeholder="Құпиясөз (8 таңба)" minlength="8" required></p>
<button type="submit">Тіркелу</button>
</form>
<a href="index.php">Басты бетке қайту</a>
</main>
</body>
</html>
