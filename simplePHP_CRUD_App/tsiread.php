<?php
require_once 'tsidb_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'show_users') {
  
    try {
        // Variable to hold the results, initialized as an empty array
        $users_profiles = [];
        //This returns PDO statement object
        $sql_query = "SELECT user_id,user_name,user_email,user_password,created_at 
                      FROM tsi_user_registrations ORDER BY user_id ASC;";

        // Prepare the query statement
        $stmt = $pdo->prepare($sql_query);

      

        // Execute the statement
        $stmt->execute(); // execute the query first then now fetch the data

        // Fetch all results into the $users_profiles array
        //This will return a multidimentional assosiative array and displays data from the last row[first to be inserted]
        $users_profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Optional: for debugging
        echo "<pre>";
        print_r($users_profiles);
        echo "</pre>";
        echo "<br>";
        // Close connections and statement
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Error : " . $e->getMessage());
    }
} 
else {
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display-User-Profile-Credentials</title>
    <!-- Cache busting for CSS file 
    to ensure the latest styles are loaded -
    by appending a query string with the current timestamp.
     -->
    <link rel="stylesheet" href="tstyle.css?v=<?php echo time(); ?>">
</head>

<body>
    <h2>Information Retrieved from the Database</h2>
    <?php if (empty($users_profiles)): ?>
        <p>No User Profile found</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>user_id</th>
                    <th>user_name</th>
                    <th>user_email</th>
                    <th>user_password</th>
                    <th>Date_created</th>
                    <th>take_actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users_profiles as $user_profile): ?>
                    <tr>
                        <td><?= htmlspecialchars($user_profile['user_id']) ?></td>
                        <td><?= htmlspecialchars($user_profile['user_name']) ?></td>
                        <td><?= htmlspecialchars($user_profile['user_email']) ?></td>
                        <td><?= htmlspecialchars($user_profile['user_password']) ?></td>
                        <td><?= htmlspecialchars($user_profile['created_at']) ?></td>
                        <td>
                            <form action="tsiupdate.php" method="post">
                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_profile['user_id']) ?>">
                                <input type="hidden" name="action" value="load_user">
                                <button type="submit">Edit</button>
                            </form>
                              <br>
                                <form action="tsidelete.php" method="POST"  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_profile['user_id']) ?>">
                                    <input type="hidden"  name="action" value="delete_user">
                                    <button type="submit">Delete</button>
                                </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <br>
    <br>
</body>

</html>