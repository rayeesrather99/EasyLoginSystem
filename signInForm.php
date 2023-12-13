<?php
session_start(); 
$con = mysqli_connect("localhost", "root", "", "signupsignindb");

// check whether the connection is successful or not
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $passWord = $_POST["password"];

    // prepared statements to prevent SQL injection.
    $sql = "SELECT `user_id`, `username`, `password` FROM `userlogin` WHERE `username` = ? AND `password` = ?;";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error");
    } else {
        // Bind/join the username and password to the statement
        mysqli_stmt_bind_param($stmt, "ss", $userName, $passWord);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                // Set the user_id in the session
                $_SESSION['user_id'] = $row['user_id'];
                
                header("Location: welcome.php");
                // Ensure no further code execution after redirection
                exit(); 
            } else {
                echo "Incorrect username or password";
            }
        } else {
            echo "Statement execution failed: " . mysqli_error($con);
        }
    }

    // Close the statement when done
    mysqli_stmt_close($stmt);
}

// Close the database connection when done
mysqli_close($con);
?>
