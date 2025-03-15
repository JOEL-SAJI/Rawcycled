<?php
$servername = "localhost";
$username = "root";  // Update if your MySQL username is different
$password = "";      // Update if you have a MySQL password
$dbname = "fashion";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize inputs
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Insert data into the Users table (without name)
    $sql = "INSERT INTO Users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the uploaded index.html after successful insertion
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
