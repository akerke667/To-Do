<?php
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null ||
!isset($_SESSION['tasks'][$id])) {
header('Location: tasks.php');
exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = trim($_POST['title'] ?? '');

if ($title !== '') {
$_SESSION['tasks'][$id]['title'] = $title;
header('Location: tasks.php');
exit;
}
}
?>

<!DOCTYPE html>

<html lang="kk">
<head>
<meta charset="UTF-8">
<title>Тапсырманы өңдеу</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
<h2>Тапсырманы өңдеу</h2>
<form method="post">
<input name="title"
value="<?= htmlspecialchars($_SESSION['tasks'][$id]['title']) ?>"
required>
<button type="submit">Сақтау</button>
</form>
<a href="tasks.php">Артқа</a>
</main>
</body>
</html>
