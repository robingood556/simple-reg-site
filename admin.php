<?php

	require_once ('vendor/connect.php');

	session_start();
	if (!$_SESSION['admin']) {
    		header('Location: /');
};

$users = mysqli_query($connect, "SELECT * FROM users WHERE login NOT IN ('admin')");
$num_rows = mysqli_num_rows( $users );
$checkusers = mysqli_query($connect, "SELECT * FROM users WHERE `checks` = 'подтвердить'");
$check_rows = mysqli_num_rows($checkusers);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<form>
<a href="mero.php" class="atuin-btn">Создать мероприятие</a>
<a href="spisokmero.php" class="atuin-btn">Список мероприятий</a>
<div class="meros">
	<h2>Список всех зарегистрированных пользователей: <?= $num_rows ?></h2>
</div>
<div class="meros">
	<h2>Список пользователей подтвердивших регистрацию: <?= $check_rows ?></h2>
</div>
<?php
$query = "SELECT * FROM users";

$result = mysqli_query($connect, $query);
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table><tr><th>ФИО</th><th>Логин</th><th>Почта</th><th>Компание</th><th>Номер телефона</th>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 1 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_free_result($result);

}

mysqli_close($connect)
?>
<a href="vendor/logout.php" class="atuin-btn">Выход</a>

</form>

</body>
</html>
