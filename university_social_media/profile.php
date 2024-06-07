<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require 'db.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC');
$stmt->execute([$user_id]);
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <h2>Your Posts</h2>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <p><?= htmlspecialchars($post['content']) ?></p>
                <?php if ($post['image_path']): ?>
                    <img src="<?= htmlspecialchars($post['image_path']) ?>" alt="Post Image">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
