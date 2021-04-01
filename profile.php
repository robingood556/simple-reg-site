<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
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

    <!-- Профиль -->

    <form action="vendor/correg.php" method="post">
	<div class="meros">
	<h2>Данные</h2>
	</div>
        <table>
	<tr>
		<th>Имя</th>
		<th>Почта</th>
		<th>Компания</th>
		<th>Телефон</th>
	</tr>
	<tr>
	<td name="firsttd"><input type="hidden" name="namez"><?=$_SESSION['user']['full_name'] ?></td>
        <td><?= $_SESSION['user']['email'] ?></td>
	<td><?= $_SESSION['user']['company'] ?></td>
	<td><?= $_SESSION['user']['tel'] ?></td>
	</tr>
	</table><br>
	<div class="meros">
	<h2>Мероприятие</h2>
	</div>
	<?php


	require_once('vendor/connect.php');
		$query ="SELECT * FROM mero WHERE status='Открытое'";

$result = mysqli_query($connect, $query);
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table><tr><th>Мероприятие</th><th>Дата</th><th>Адрес</th><th>Аудитория</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 1 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}

mysqli_close($link);
?>
<a href="vendor/correg.php" class="atuin-btn">Подтвердить регистрацию</a>
<a href="vendor/logout.php" class="atuin-btn">Выход</a>
    </form>


</body>
</html>
