<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];
    $image_path = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_dir = 'uploads/';
        if (!is_dir($image_dir)) {
            mkdir($image_dir, 0777, true);
        }

        $image_file = $image_dir . basename($_FILES['image']['name']);
        $image_file_type = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['image']['tmp_name']);

        if ($check !== false && ($image_file_type == 'jpg' || $image_file_type == 'jpeg' || $image_file_type == 'png')) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_file)) {
                $image_path = $image_file;
            } else {
                echo "Failed to upload image.";
                exit();
            }
        } else {
            echo "Invalid file type.";
            exit();
        }
    }

    $stmt = $pdo->prepare('INSERT INTO posts (user_id, content, image_path) VALUES (?, ?, ?)');
    if ($stmt->execute([$user_id, $content, $image_path])) {
        header('Location: posts.php');
        exit();
    } else {
        echo "Failed to create post.";
        var_dump($stmt->errorInfo());
    }
}
?>