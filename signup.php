<?php
    require('config/db.php');
    if(isset($_POST['submit'])) {
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn ,$_POST['password']);
        $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";

        try {
            mysqli_query($conn, $query);
            echo "You signed up successfuly.";
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT Sign Up Form</title>
</head>
<body>
    <header>
        <h1>Sign Up</h1>
    </header>
    <section class="main">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <dev>
              <label>Username</label>
              <input type="text" name="username" style="margin-right: auto;">
            </dev>
            <br>
            <dev>
                <label>Password</label>
                <input name="password" type="password" style="margin: 3px;">
            </dev>
            <input name="submit" class="btn" type="submit" value="Sign Up">
            <dev name="message" id="confermation"></dev>
            <h4>You can Log in <a href="login.php">here</a></h4>
        </form>
    </section>
</body>
</html>