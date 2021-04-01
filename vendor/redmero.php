<?php

    session_start();
    require_once 'connect.php';

    $meros = $_POST['meros'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $aud = $_POST['aud'];
    $status = $_POST['status'];

        mysqli_query($connect, "UPDATE `mero` SET `date`='$date',`place`='$place',`aud`='$aud',`status`='$status' WHERE `name`='$meros' ");

        $_SESSION['message'] = 'Мероприятие Отредактировано!';
        header('Location: ../admin.php');
	
	mysqli_close($connect);

?>
