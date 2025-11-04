<?php
require 'tsidb_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $id = $_POST['id'];

    // Fetch user
    $stmt = $pdo->prepare("SELECT * FROM tsi_user_registrations WHERE user_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) die("User not found!");

    // If update form submitted
    if (isset($_POST['username'], $_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (!empty($username) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $update = $pdo->prepare("UPDATE tsi_user_registrations 
            SET user_name = :fullname, user_password = :password WHERE user_id = :id");

            $update->bindParam(':id', $id);
            $update->bindParam(':username', $username);
            $update->bindParam(':password', $password);

            $update->execute();

            echo "<p>User updated successfully! <a href='tsiread.php'> ->Go Back</a></p>";
            exit;
        } else {
            echo "<p style='color:red;'>Invalid input.</p>";
        }
        // Close connections
        $stmt = null;
        $pdo = null;
    }
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User-Profile</title>
    <link rel="stylesheet" href="tstyle.css">
</head>

<body>
    <h2>Edit User Credentials</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

        <label>Username:</label><br>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>