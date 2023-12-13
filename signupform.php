<?php
$con = mysqli_connect("localhost", "root", "", "signupsignindb");

// Make sure the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["new-username"];
    $userEmail = $_POST["new-email"];
    $passWord = $_POST["new-password"];

    // It's essential to use prepared statements to prevent SQL injection.

    // Check if the username or email already exists
    $checkSql = "SELECT `user_id` FROM `userlogin` WHERE `username` = ? OR `email` = ?;";
    
    $checkStmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($checkStmt, $checkSql)) {
        die("SQL error");
    } else {
        // Bind the username and email to the statement
        mysqli_stmt_bind_param($checkStmt, "ss", $userName, $userEmail);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);
        
        if (mysqli_fetch_assoc($result)) {
            echo "Username or email already exists. Please choose a different one.";
        } else {
            // If username and email are unique, proceed with registration
            $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);
            $insertSql = "INSERT INTO `userlogin` (`username`, `email`, `password`) VALUES (?, ?, ?);";

            $insertStmt = mysqli_stmt_init($con);

            if (!mysqli_stmt_prepare($insertStmt, $insertSql)) {
                die("SQL error");
            } else {
                mysqli_stmt_bind_param($insertStmt, "sss", $userName, $userEmail, $hashedPassword);

                if (mysqli_stmt_execute($insertStmt)) {
                    echo "Registration successful!";
                    header("Location: signupwelcome.php");
                } else {
                    echo "Registration failed: " . mysqli_error($con);
                }
            }
        }
    }

    // Close the statement for checking
    mysqli_stmt_close($checkStmt);
}

// Close the database connection when done
mysqli_close($con);
?>
