<?php
session_start();

require_once "includes/config.php";
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSRF - Synchronizer Token Pattern</title>

    <link rel="stylesheet" href="styles/stylesheet.css" />
    <link rel="stylesheet" href="styles/welcome.css" />
</head>
<body>
    <h1>Welcome</h1>
    <hr />

    <section>
        <?php
        if (isset($_SESSION["user"])) {
        if (isset($_POST["submit"])) {
        $name = $_POST["name"];

        if (strlen($name) > 30) {
        ?>
        <script>
            alert("Length of name should not exceed 30 characters.");
        </script>
        <?php
        } // end if
        else if (isset($_POST["token"]) && $_SESSION["token"] === $_POST["token"]) {
        ?>
        <script>
            alert("Success: Valid Token");
        </script>
        <?php
        $sql = "INSERT INTO user (username, name) VALUES ('" . $_SESSION["user"] . "', '" . $name . "') ON DUPLICATE KEY UPDATE name = '" . $name . "';";

        $conn->query($sql);
        } // end else if
        else {
        ?>
        <script>
            alert("Error: Invalid Token");
        </script>
        <?php
        } // end else
        } // end if

        $sql = "SELECT name FROM user WHERE username = '" . $_SESSION["user"] . "';";

        $name = $conn->query($sql);

        if (1 === mysqli_num_rows($name)) {
        ?>
        <p>Hi, <span><?php echo htmlspecialchars(mysqli_fetch_array($name)[0]); ?></span></p>
        <?php
        } // end if
        else {
        ?>
        <p>We would like to know your name. Click <a href="/">here</a> to provide your name.</p>
        <?php
        } // end else
        } // end if
        else { ?>
        <p>You must be logged in to access this page. Click <a href="/">here</a> to login.</p>
        <?php } // end else ?>
    </section>
</body>
</html>