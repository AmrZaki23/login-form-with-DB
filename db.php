<?php

    $conn = mysqli_connect('localhost', 'root', '123456', 'users');

    if(mysqli_connect_errno()) {
        echo 'Failed to connect to DB '. mysqli_connect_errno();
    }

?>