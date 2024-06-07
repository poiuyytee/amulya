<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require 'db.php';

$stmt = $pdo->prepare('SELECT p.*, u.username FROM posts p JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC');
$stmt->execute();
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
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
        <h2>Create Post</h2>
        <form method="post" action="create_post.php" enctype="multipart/form-data">
            <textarea name="content" placeholder="What's on your mind?" required></textarea>
            <input type="file" name="image" accept="image/jpeg,image/png">
            <button type="submit">Post</button>
        </form>
        
        <h2>All Posts</h2>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h3><?= htmlspecialchars($post['username']) ?></h3>
                <p><?= htmlspecialchars($post['content']) ?></p>
                <?php if ($post['image_path']): ?>
                    <img src="<?= htmlspecialchars($post['image_path']) ?>" alt="Post Image">
                <?php endif; ?>
                <form method="post" action="like_post.php">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <button type="submit">Like</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
