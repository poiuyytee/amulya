<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $sender_id = $_SESSION['user_id'];
    $receiver_id = 2; // Replace with the receiver's user ID
    $message = $_POST['message'];

    $stmt = $pdo->prepare('INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)');
    if ($stmt->execute([$sender_id, $receiver_id, $message])) {
        header("Location: messages.php");
        exit();
    } else {
        echo "Error sending message.";
    }
}
?>
