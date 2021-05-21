<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}elseif($_SESSION['admin']) {
    header('Location: admin.php');
};

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->

    
    <form action="vendor/signin.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" class="button-5"><span class="link-content">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php" class="submit">зарегистрируйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<label class="msg"> ' . $_SESSION['message'] . ' </label>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
