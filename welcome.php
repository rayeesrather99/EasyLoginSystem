<?php 
 // Start the session
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        main {
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #555;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #5555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome! You are fully signed in.</h1>
    </header>
    
    <main>
        <p>Welcome to your personalized dashboard. Explore and manage your account settings below.</p>

        <!-- Logout Link -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </main>
</body>
</html>
