<?php

	require_once ('vendor/connect.php');

	session_start();
	if (!$_SESSION['admin']) {
    		header('Location: /');
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
<form action="vendor/meros.php" method="post">
<a href="mero.php" class="atuin-btn">Создать мероприятие</a>
<a href="red.php"  class="atuin-btn">Редактирование</a>
<?php

$query ="SELECT * FROM mero";

$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table><tr><th>Название мероприятия</th><th>Дата</th><th>Адрес</th><th>Аудитория</th><th>Статуc</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 1 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
	
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
};

mysqli_close($link);

?>
<a href="vendor/logout.php" class="atuin-btn">Выход</a>

</form>

</body>
</html>
