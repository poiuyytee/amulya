<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch friends from the database
require 'db.php';
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT u.username FROM friends f JOIN users u ON f.friend_id = u.id WHERE f.user_id = ? AND f.status = "accepted"');
$stmt->execute([$user_id]);
$friends = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>University Social Media</h1>
    </header>
    <nav>
        <a href="home.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="friends.php">Friends</a>
        <a href="messages.php">Messages</a>
        <a href="posts.php">Posts</a>
    </nav>
    <div class="container">
        <h2>Your Friends</h2>
        <?php foreach ($friends as $friend): ?>
            <p><?= htmlspecialchars($friend['username']) ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
