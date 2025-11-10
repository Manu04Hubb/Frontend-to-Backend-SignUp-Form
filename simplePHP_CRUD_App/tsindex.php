<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <!-- Cache busting for CSS file 
    to ensure the latest styles are loaded -
    by appending a query string with the current timestamp.
     -->
  <link rel="stylesheet" href="tstyle.css?v=<?php echo time(); ?>">
</head>

<body>
<h1>User Management System</h1>
  <div id="userManagement">
    <a href="tsicreate.php">Add User</a> |
    <a href="index.php">View Users</a>
</div>
</body>

</html>