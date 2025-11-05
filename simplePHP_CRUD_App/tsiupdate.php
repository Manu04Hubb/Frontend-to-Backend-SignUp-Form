<?php
require 'tsidb_connection.php';

$user = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action']) && $_POST['action'] === 'load_user') {
        // Load user for editing
        $id = $_POST['user_id'];
        $stmt = $pdo->prepare("SELECT * FROM tsi_user_registrations WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            die("User not found.");
        }
    }

    

    //Handle actual update
    elseif (isset($_POST['action']) && $_POST['action'] === 'update_user') {
        $id = $_POST['user_id'];
        $user_name = trim($_POST['username']);
        $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

        try {
            $update_query = "UPDATE tsi_user_registrations 
            SET user_name = :username, user_password = :password WHERE user_id = :id;";
            $stmt = $pdo->prepare($update_query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':username', $user_name);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            echo "<p>User updated successfully! <a href='tsiread.php'> ->Go Back</a></p>";
              $stmt = null;
              $pdo = null;
            die();
        } catch (PDOException $e) {
            die("Error : " . $e->getMessage());
        }
    } else {
        echo "<p style='color:red;'>Invalid input.</p>";
    }
    // Close connections
  
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
    <?php if (!empty($user)): ?>
        <form action="tsiupdate.php" method="POST">
            <input type="hidden" name="action" value="update_user">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>">

            <label>Username:</label><br>
            <input type="text" name="username" value="<?= htmlspecialchars($user['user_name']) ?>" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" value="<?= htmlspecialchars($user['user_password']) ?>" required><br><br>

            <button type="submit">Update</button>
        </form>
    <?php endif; ?>
</body>

</html>