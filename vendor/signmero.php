<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $aud = $_POST['aud'];
    $status = $_POST['status'];


        mysqli_query($connect, "INSERT INTO `mero` (`id`, `name`, `date`, `place`,`aud`, `status`) VALUES (NULL, '$name', '$date', '$place', '$aud', '$status')");

        $_SESSION['message'] = 'Мероприятие зарегистрировано!';
        header('Location: ../admin.php');
	
	mysqli_close($connect);

?>
