<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];

    $stmt = $pdo->prepare('INSERT INTO likes (post_id, user_id) VALUES (?, ?)');
    if ($stmt->execute([$post_id, $user_id])) {
        header('Location: posts.php');
        exit();
    } else {
        echo "Failed to like post.";
    }
}
?>
