<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>LOGIN FORM</h1>


<?php
// Initialize variables

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "registration_php";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $login_error = "Connection failed: " . $conn->connect_error;
    } else {
        // Get form data and sanitize it
        $email = trim($_POST["email"]);
        $password_input = trim($_POST["password"]);

        // Prepare and execute the statement
        $stmt = $conn->prepare("SELECT password FROM registration WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Check if email exists
        if ($stmt->num_rows == 1) {
            // Bind the result
            $stmt->bind_result($stored_password);
            $stmt->fetch();

            // Verify the password
            if ($password_input === $stored_password) {
                echo "login success";
                // Optionally redirect to a secure page
                // header("Location: dashboard.php");
                // exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No account found with that email.";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>

<!-- Display success or error message -->


<!-- Display the login form -->
<form action="login.php" method="POST">
    <div>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
    </div>
    <div>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
    </div>
    <input type="submit" value="Login">
</form>

</body>
</html>
