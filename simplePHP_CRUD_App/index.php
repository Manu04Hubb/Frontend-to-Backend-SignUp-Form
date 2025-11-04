<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sends Post request method to readfile</title>
</head>
<body>
    <!--This page will contain a form that sends a POST request to display_user_profiles.php-->
     <h1>Welcome to the User Dashboard</h1>
    <p>Click below to view all registered users.</p>

    <form action="tsiread.php" method="POST">
        <input type="hidden" name="action" value="show_users">
        <button type="submit">View Users</button>
    </form>
</body>
</html>