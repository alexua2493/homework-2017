<?php session_start();?>
<?


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
if(!empty($username) && !empty($password) && !empty($password2) && !empty($email) && ($password == $password2)) {
try {
    $dbh = new PDO('mysql:host=localhost;dbname=forumseries', "stud", "password");
    $sth = $dbh->prepare('INSERT INTO users SET username = :username, password = :password, email = :email'); 
    $sth->execute(array( ":username" => $username, ":password" => $password, ":email" => $email));
    echo "Вы успешно зарегистрированы!";
        $dbh = null;
    } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }
}
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP ФОРУМ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


    <div id="wrapper">
        <h2>Добро пожаловать на мой форум</h2>
        <p>Форум находится на стадии разработки.<br><a href="index.php">Вернуться на главную</a></p>

<div id="login">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Введите ваш логин:</label><br>
        <input type="text" name="username" placeholder="Логин" required><br>
        <label for="password">Введите ваш пароль:</label><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <label for="password">Повторите ваш пароль:</label><br>
        <input type="password" name="password2" placeholder="Пароль" required><br>
        <label for="email">Введите ваш email:</label><br>
        <input type="text" name="email" placeholder="Почта" required><br>
        <button type="submit" name="submit">Отправить</button>
        </form>
</div> 
</div> 