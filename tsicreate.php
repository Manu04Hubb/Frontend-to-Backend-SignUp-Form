<?php
require_once 'tsidb_connection.php';

try{
    // Variable to hold the results, initialized as an empty array
    $users_profiles = [];
    //This returns PDO statement object
    $sql_query = "SELECT user_id,user_name,user_email,user_password 
                  FROM tsi_user_registrations ORDER BY user_id DESC;";

      // Prepare the query statement
        $stmt = $pdo->prepare($sql_query);

         // Execute the statement
        $stmt->execute();// execute the query first then now fetch the data

        // Fetch all results into the $users_profiles array
        $users_profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
        // Optional: for debugging
     echo "<pre>";
     print_r($users_profiles);
     echo "</pre>";
     echo "<br>";
         // Close connections and statement
        $pdo = null; 
        $stmt = null; 
    }

catch(PDOException $e){
 die("Error : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display-User-Profile-Credentials</title>
</head>
<body>
    <?php if(empty($users_profiles)):?>
        <p>No User Profile found</p>
    <?php else:?>
        <table>
            <thead>
                <tr>
                    <th>user_id</th>
                    <th>user_name</th>
                    <th>user_email</th>
                    <th>user_password</th>
                    <th>Date_created</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                <?php foreach($users_profiles as $user_profile):?>
                <td><?= htmlspecialchars($users_profiles['user_id'])?></td>
                <td><?= htmlspecialchars($users_profiles['username'])?></td>
                <td><?= htmlspecialchars($users_profiles['email'])?></td>
                <td><?= htmlspecialchars($users_profiles['password'])?></td>
                <td><?= htmlspecialchars($users_profiles['created_at'])?></td>
                <td><a href="tsiupdate.php" target="_blank" rel="noopener noreferrer">Edit Credentials</a></td>
                <td><a href="tsidelete.php" target="_blank" rel="noopener noreferrer"
                onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a></td>
                <?php endforeach;?>
                </tr>
            </tbody>
        </table>
        <?php endif;?>
</body>
</html>