<!DOCTYPE html>
<html>
<head>
    <title>List Data</title>
</head>
<body>
    <h1>List of Entered Data</h1>
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
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Edit</th><th>Delete</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
            echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data available.";
    }

    $conn->close();
    ?>
    <br>
    <a href="index.php">Back to Data Entry</a>
</body>
</html>
