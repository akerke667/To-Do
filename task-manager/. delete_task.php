<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id !== false && $id !== null &&
isset($_SESSION['tasks'][$id])) {
unset($_SESSION['tasks'][$id]);
$_SESSION['tasks'] = array_values($_SESSION['tasks']);
}
}

header('Location: tasks.php');
exit;
?>
