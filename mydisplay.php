<?php 
  include_once 'dbconfig/db.php';
  $users = [];
  if($_SERVER['REQUEST_METHOD'] === "POST" && isset ($_POST['full-name']) && $_POST['full-name'] === 'display'){
    

     $read_query = "SELECT * FROM users;";
     $stmt = $pdo->prepare($read_query);
     $stmt->execute();

     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
     echo "<pre>";
      print_r($users);
     echo "<pre>";
        // Close connections and statement
        $pdo = null;
        $stmt = null;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table Displayed in the Browser</title>
</head>
<body>
    <?php if(!$users) : ?>
        <h2>No such users in the Database</h2>
       <?php else :?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Fullname</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Creation Timestamp</th>
                    <th>Take Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) :?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['fullname']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['password']) ?></td>
                <td><?= htmlspecialchars($user['created_at']) ?></td>
                <td>
                    <form action="mydelete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                        <input type="hidden" name="delete" value="delete-user">
                        <button type="submit">Delete</button>
                    </form>
                    <form action="myupdate.php" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                        <input type="hidden" name="fetch" value="fetch-user">
                        <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
  <?php endif; ?>     
</body>
</html>