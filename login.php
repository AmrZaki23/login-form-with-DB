<?php

use LDAP\Result;

    require('config/db.php');
    if(isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn ,$_POST['password']);
        try {
            $query = "SELECT password FROM users WHERE username='$username'";
            $query = mysqli_query($conn, $query);
            $query = mysqli_fetch_assoc($query);
            if(empty($query)) {
                echo "There is no user with this name!";
            } else if($query['password'] === $password) {
                echo 'Login Succeeded!';
            } else {
                echo 'Wrong credintials.';
            }
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
    <title>CAT Login Form</title>
</head>
<body>
    <header>
        <h1>CAT Login Form</h1>
    </header>
    <section class="main">
        <form id="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <h2>Login</h2>
            <dev>
              <label>Username</label>
              <input type="text" class="username" name="username" style="margin-right: auto;">
            </dev>
            <br>
            <dev>
                <label>Password</label>
                <input type="password" class="password" name="password" style="margin: 3px;">
            </dev>
            <input name="submit" class="btn" type="submit" value="Log in">
            <dev name="message" id="loginStatus"></dev> 
            <h4>Not a user? Sign up <a href="signup.php">here</a></h4>
        </form>
    </section>
</body>
</html>