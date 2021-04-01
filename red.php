<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: index.php');
    };

	require_once 'vendor/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/redmero.php" method="post" enctype="multipart/form-data">
        <label>Названия мероприятия</label>
<?php
	
	$querys = "SELECT * FROM mero";
	$results = mysqli_query($connect, $querys);
	echo "<select name='meros'>";
	while ($rows = mysqli_fetch_array($results)) {
		echo "<option value=" .$rows['name'] . ">". $rows['name'].  "</option>";
	}
	echo "</select>";
?>
        <br>
	<label>Дата</label>
        <input type="date" name="date" required>
	<label>Адрес</label>
	<input type="text"  name="place" placeholder="Введите адрес" required>
	<label>Аудитория</label>
	<input type="text" name="aud" placeholder="Введите аудиторию" required> 
	<label>Статус мероприятия</label><br>
	<select name="status">
		<option value="Открытое">Открытое</option>
		<option value="Закрытое">Закрытое</option>
	</select><br>
        <button type="submit">Отредактировать</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
