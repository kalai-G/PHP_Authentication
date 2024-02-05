<?php
session_start();

// Connection to the database (replace with your database credentials)
// Server name must be localhost 
$servername = "localhost"; 
  
// In my case, user name will be root 
$username = "root"; 
  
$password = ""; 
$database ="kalai";
$conn = new mysqli($servername,  
            $username, $password,$database); 
  
// Check connection 
if ($conn->connect_error) { 
    die("Connection failure: " 
        . $conn->connect_error); 
}  

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user data from the database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            // Login successful
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];
            header("Location: dashboard.php"); // Redirect to a secure page
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>
