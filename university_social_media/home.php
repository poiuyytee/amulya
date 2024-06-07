<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to University Social Media</h1>
    </header>
    <nav>
        <a href="home.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="friends.php">Friends</a>
        <a href="messages.php">Messages</a>
        <a href="posts.php">Posts</a>
    </nav>
    <div class="container">
        <p>Home page content goes here...</p>
    </div>
</body>
</html>
