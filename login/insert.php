<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shivamdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$timest = date("d:m:Y h:i:sa");

$sql = "INSERT INTO users (name, email, password, timestamp) VALUES ('$name', '$email','$password','$timest')";

if ($conn->query($sql) === TRUE) {
    // echo "Data inserted successfully!";
    echo "<script type='text/javascript'> alert('Successful')</script>";
    header("location: index.php");
    // $arr = array ('code'=>"1",'msg'=>"Congratulations, Your Account is Created!");
    // echo json_encode($arr);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
