<?php
  $servername = "localhost"; 
  $username = "root"; 
$password = ""; 
$database ="kalai";
// Creating a connection 
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

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Check if the username is unique
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_query);

    if ($result->num_rows == 0) {
        // Insert new user into the database
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Username already exists!";
    }
}

$conn->close();
?>
