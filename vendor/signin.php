<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    $check_admins_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `id` = '4'");


    if (mysqli_num_rows($check_user) > 0 && mysqli_num_rows($check_admins_user) == 0 ) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "company" => $user['company'],
	    "tel" => $user['tel'],
            "email" => $user['email']
        ];

        header('Location: ../profile.php');

    }elseif (mysqli_num_rows($check_admins_user) > 0 && mysqli_num_rows($check_admins_user) > 0) {

	$admin = mysqli_fetch_assoc($check_admins_user);

        $_SESSION['admin'] = [
            "id" => $admin['id'],
            "email" => $admin['email']
        ];


	header('Location: ../admin.php');

    }else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    };

    ?>

