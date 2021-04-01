<?php

    session_start();
    require_once 'connect.php';
    $username = $_SESSION['user']['full_name'];

        mysqli_query($connect, "UPDATE `users` SET `checks`='подтвердить' WHERE `full_name`= '$username' ");

        header('Location: ../profile.php');
	
	mysqli_close($connect);

?>
