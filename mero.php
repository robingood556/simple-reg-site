<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: index.php');
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

    <!-- Форма регистрации -->

    <form action="vendor/signmero.php" method="post" enctype="multipart/form-data">
        <label>Названия мероприятия</label>
        <input type="text" name="name" placeholder="Введите название мероприятия" required>
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
        <button type="submit">Зарегестрировать мероприятие</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
