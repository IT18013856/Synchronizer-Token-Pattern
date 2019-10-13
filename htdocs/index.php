<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSRF - Synchronizer Token Pattern</title>

    <link rel="stylesheet" href="styles/stylesheet.css" />

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="scripts/csrf.js"></script>
</head>
<body onload="addToken();">
    <h1>CSRF - Synchronizer Token Pattern</h1>
    <hr />

    <section>
        <?php if (isset($_SESSION["user"])) { ?>
        <p style="float: right;"><a href="includes/logout.php">Logout</a></p>
        <form name="welcome" action="welcome.php" method="post">
            <input type="text" name="name" placeholder="Enter your name." maxlength="30" required />
            <br />
            <input type="submit" name="submit" value="Let's go!" />
        </form>
        <?php } // end if
        else { ?>
        <?php
        if (isset($_SESSION["error"])) {
        unset($_SESSION["error"]);
        ?>
        <script>
            alert("The username or password you have entered is incorrect.")
        </script>
        <?php } // end if ?>
        <form name="login" action="includes/login.php" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <br />
            <input type="password" name="password" placeholder="Password" required />
            <br />
            <input type="submit" name="submit" value="Login" />
        </form>
        <?php } // end else ?>
    </section>
</body>
</html>