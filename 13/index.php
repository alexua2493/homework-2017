<?php
session_start();
    if(isset($_POST['log'])and isset($_POST['pass'])):
        $login = $_POST['log'];
        $password = $_POST['pass'];
        $arr = ['log' => 'admin', 'pass' => 'admin'];
            if(($arr['log'] == $login)and($arr['pass']==$password)):
                $_SESSION['auth'] = true; 
                $_SESSION['login'] = $login;
                $_SESSION['loginTimes'][] = time();
	            echo "Добро пожаловать " . $login . "!" ."<br/>";
?>
    <table border='1' cellspacing="0">
    <th>История логинов:</th>
<?php
    foreach($_SESSION['loginTimes'] as $time):
?>
    <tr><td><?php echo date("Y-m-d H:i:s", $time) . "<br/>"; ?></td></tr>
<?php endforeach; ?>
    </table>
    <a href="index.php">Выйти</a>
<?php
                else:
                echo "Не верный логин или пароль";
                $_SESSION['auth'] = false; 
                endif;
    endif;
if(empty($_POST['log']) or empty($_POST['pass'])):
?>
<html>
  <head>
    <title>PHP,HTML,CSS</title>
      <style>
          input{
              margin-top: 8px;
          }
      </style>
  <head>
   <form action="" method="post">
	<input type="text" placeholder="введите логин" name="log"  value="<?=$login;?>"><br>
	<input type="password" placeholder="введите пароль" name="pass"><br>
	<input type="submit" name="sub" value="Отправить">
    </form>
</html>
 <?php endif;?>

