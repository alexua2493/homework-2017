<?php
session_start();
require_once '/include/db.php';
require_once '/include/valid.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Список записей</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/styless.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	</head>
	<body>
	        <div id="login_form" style=" margin-top: 10px; margin-right: 50px; text-align: right; ">
	          <?php if (!$_SESSION['logined']):?>
                    <p class="error"><?=$error_login;?></p>
                    <form action="" method="post" class="" id="reg">
                          <input type="text" name="name" placeholder="Введите имя"><br>
                          <input type="password" name="password" placeholder="Введите пароль" class=""><br>
                          <input name="sub" type="submit" value="Отправить">
                    </form>
              <?php else: echo "Добро пожаловать " . $_SESSION['user']. " ! ";?>
                    <a href='?exit' class="ex">Выход</a>
              <?php endif; ?>
            </div>
            <div id="search" style=" margin-top: 10px; margin-right: 50px; text-align: right; ">
	      	        <form method="post" action="include/search.php">
                         <input type="text" name="search_box" id="search_box" class='search_box'/>
                         <input type="submit" value="Поиск" class="search_button" /><br />
                    </form>

            </div>
	      </div>

		<div id="wrapper">
			<h1> </h1>
			<h1>Все новости</h1>
			<div id="sort">
				<a href="index.php?sort=old">новые</a> |
				<a href="index.php?sort=new">старые</a>
			</div>
                 <?php
                 require_once '/include/pagination.php';
                 ?>
            <?php if($_SESSION['logined']): ?>
			<div>
				<a href="include/add.php" class="btn btn-danger btn-block">Добавить запись</a>
			</div>
            <?php endif; ?>
		</div>
	</body>
</html>


			