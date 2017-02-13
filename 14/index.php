<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php
if (empty($log) and empty($pass)):
    ?>
    <form action="view/result.php" method="post">
        <label for="name">Введите имя</label>
        <input type="text" id="name" name="login">
        <label for="pass">Введите пароль</label>
        <input type="password" id="pass" name="password">
        <label for="db">Введите название базы данных</label>
        <input type="text" id="db" name="dataBase">
        <input type="submit" name="sub" value="Отправить">
    </form>
<?php endif;
?>
</body>
</html>