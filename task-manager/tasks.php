<?php
session_start();

if (!isset($_SESSION['tasks'])) {
$_SESSION['tasks'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = trim($_POST['title'] ?? '');

if ($title !== '') {
$_SESSION['tasks'][] = [
'title' => $title,
'status' => 'Орындалмаған'
];
}
}

$search = trim($_GET['search'] ?? '');
?>

<!DOCTYPE html>

<html lang="kk">
<head>
<meta charset="UTF-8">
<title>Менің тапсырмаларым</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
<h1>Менің тапсырмаларым</h1>

<form method="post">
    <input name="title" placeholder="Жаңа тапсырма" required>
    <button type="submit">Қосу</button>
</form>

<form method="get">
    <input name="search" placeholder="Іздеу"
           value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Іздеу</button>
</form>

<?php foreach ($_SESSION['tasks'] as $i => $task): ?>
    <?php if ($search === '' || stripos($task['title'], $search) !== false): ?>
        <div class="card">
            <p><?= htmlspecialchars($task['title']) ?></p>
            <p><?= htmlspecialchars($task['status']) ?></p>
            <a href="edit_task.php?id=<?= $i ?>">Өңдеу</a>
            <form method="post" action="delete_task.php">
                <input type="hidden" name="id" value="<?= $i ?>">
                <button type="submit">Жою</button>
            </form>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<p><a href="index.php">Басты бет</a></p>


</main>
</body>
</html>
