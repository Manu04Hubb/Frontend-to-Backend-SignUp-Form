<?php
require_once 'tsidb_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_user') {
    $user_id = $_POST['user_id'];

    $stmt = $pdo->prepare("DELETE FROM tsi_user_registrations WHERE user_id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();

    header("Location: tsiread.php");
    echo "<br>";
    echo "User with ID $user_id has been deleted.";
    die();
} else {
    return;
}

