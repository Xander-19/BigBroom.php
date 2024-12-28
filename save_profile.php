<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to update your profile.']);
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'bigbroomDB');
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

$username = $_SESSION['username'];
$fullname = $_POST['fullname'];
$profilePicture = $_FILES['profilePicture'];

$profilePicturePath = 'img/default.png';

if ($profilePicture['error'] == UPLOAD_ERR_OK) {
    $targetFile = $targetDir . basename($profilePicture['name']);
    if (move_uploaded_file($profilePicture['tmp_name'], $targetFile)) {
        $profilePicturePath = $targetFile;
    } else {
        echo json_encode(['success' => false, 'message' => 'Error uploading profile picture.']);
        exit();
    }
} else if ($profilePicture['error'] != UPLOAD_ERR_NO_FILE) {
    echo json_encode(['success' => false, 'message' => 'File upload error: ' . $profilePicture['error']]);
    exit();
}

$query = "UPDATE users SET fullname = '$fullname', profile_picture = '$profilePicturePath' WHERE username = '$username'";
if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error updating profile: ' . mysqli_error($conn)]);
}

$conn->close();
?>
