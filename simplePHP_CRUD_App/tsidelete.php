<?php
require_once 'tsidb_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM tsi_user_registrations WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: tsiread.php");
    exit;
} else {
    die("Invalid request");
}

