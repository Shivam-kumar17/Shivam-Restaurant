<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shivamdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT id, name, email, password FROM users WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row["name"]; ?>" required><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row["email"]; ?>" required><br><br>

                <label for="password">Password:</label>
                <input type="text" name="password" value="<?php echo $row["password"]; ?>" required><br><br>

                <input type="submit" value="Update">
            </form>
            <?php
        } else {
            echo "No data found.";
        }
    }
    ?>
    <br>
    <a href="table.php">Back to List</a>
</body>
</html>
