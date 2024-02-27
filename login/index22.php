<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style22.css">
</head>

<body>

    <div class="wrapper">
        <div class="form-wrapper sign-up">
            <form action="">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" required>
                    <label for="">Password</label>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="#" class="signIn-link">Sign In</a></p>
                </div>
            </form>
        </div>

        <div class="form-wrapper sign-in">
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
                <h2>Edit Data</h2>
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <div class="input-group">
                    <input type="text" name="name" value="<?php echo $row["name"]; ?>" required>
                    <label for="name">Username</label>
                </div>
                <div class="input-group">
                <input type="email" name="email" value="<?php echo $row["email"]; ?>" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-group">
                <input type="text" name="password" value="<?php echo $row["password"]; ?>" required>
                    <label for="password">Password</label>
                </div>
                <!-- <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div> -->
                <button type="submit" class="btn">Update</button>
                <!-- <input type="submit" value="Update"> -->
                <div class="sign-link">
                    <p>Don't want to Edit Data? <a href="table.php" class="signUp-link">Back to List</a></p>
                </div>
            </form>
            <?php
        } else {
            echo "No data found.";
        }
    }
    ?>
        </div>
    </div>

    <script src="script22.js"></script>
</body>

</html>