<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM messages WHERE receiver_id = ? OR sender_id = ? ORDER BY created_at DESC');
$stmt->execute([$user_id, $user_id]);
$messages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
        <h2>Your Messages</h2>
        <div id="messages-container">
            <?php foreach ($messages as $message): ?>
                <div class="message"><?= htmlspecialchars($message['message']) ?></div>
            <?php endforeach; ?>
        </div>
        <form id="message-form" method="post" action="send_message.php">
            <textarea id="message-input" name="message" placeholder="Type a message..." required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
