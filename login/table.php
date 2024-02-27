<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <h1><span class="blue">&lt;</span>Table<span class="blue">&gt;</span> <span class="yellow">Responsive</pan>
    </h1>
    <h2>Created by <a href="" target="_blank">Shivam</a></h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shivamdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, email, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<table class='container'>";

        echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Edit</th><th>Delete</th></tr></thead>";

        while ($row = $result->fetch_assoc()) {
            echo "<tbody><tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td><a class='bc' href='index22.php?id=" . $row["id"] . "'>Edit</a></td>";
            echo "<td><a class='bc' href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr></tbody>";
        }

        echo "</table>";
    } else {
        echo "No data available.";
    }

    $conn->close();
    ?>
    <br>
    <a class="bck" href="index.php">Back to Data Entry</a>
</body>

</html>