<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "crowdfunding";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$goal = $_POST['goal'];
$category = $_POST['category'];

// SQL query to insert data
$sql = "INSERT INTO campaigns (title, description, goal, category) VALUES ('$title', '$description', '$goal', '$category')";

if ($conn->query($sql) === TRUE) {
    echo "Campaign created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
