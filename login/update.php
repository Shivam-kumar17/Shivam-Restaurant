<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shivamdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location: table.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
