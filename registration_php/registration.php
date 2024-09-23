<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<h1>REGISTRATION FORM</h1>

<?php
// Define variables and initialize with empty values
$name = $email = $password = "";
$registration_success = "";
$registration_error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost"; // Replace with your database server name
    $username = "root";        // Replace with your database username
    $password_db = "";         // Replace with your database password
    $dbname = "registration_php";   // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $registration_error = "Connection failed: " . $conn->connect_error;
    } else {
        // Get form data and sanitize it
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO registration (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            $registration_success = "You have successfully registered!";
            // Redirect to the login page after successful registration
            header("Location: login.php");
            exit();
        } else {
            $registration_error = "Oops! Something went wrong: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>

<!-- Display success or error message -->
<?php
if (!empty($registration_success)) {
    echo "<p style='color: green;'>$registration_success</p>";
}
if (!empty($registration_error)) {
    echo "<p style='color: red;'>$registration_error</p>";
}
?>

<!-- Display the registration form -->
<form action="registration.php" method="POST">
    <div>
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" id="name" required>
    </div>
    <div>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
    </div>
    <div>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
    </div>
    <input type="submit" value="Register">
</form>

</body>
</html>
