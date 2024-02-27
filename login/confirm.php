<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shivamdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password = $_POST["password"];

if(!empty($email) && !empty($password) && !is_numeric($email))
{
    $query = "select * from users where email = '$email' limit 1";
    $result = mysqli_query($conn, $query);
    
    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] == $password)
            {
                header("location: ../ShivamRestaurants/index.php");
                die;
            }
        }
        // echo "<script type='text/javascript'> alert('Login failed: Invalid credentials')</script>";
        header("location: index.php");
    }
    else{
        // echo "<script type='text/javascript'> alert('Login failed: Invalid credentials')</script>";
        header("location: index.php");
    }
}
?>