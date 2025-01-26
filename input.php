<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $first_visit = $_POST['first_visit'];
    $id = uniqid();

    $user = [
        'name' => $name,
        'id' => $id,
        'first_visit' => $first_visit,
        'last_visit' => $first_visit
    ];

    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    $_SESSION['users'][] = $user;

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー追加</title>
</head>
<body>
    <h1>ユーザー追加</h1>
    <form action="input.php" method="post">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="first_visit">初診日:</label>
        <input type="date" id="first_visit" name="first_visit" required>
        <br>
        <button type="submit">追加</button>
    </form>
    <p><a href="index.php">戻る</a></p>
</body>
</html>
