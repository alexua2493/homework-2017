<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP ФОРУМ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
</div>  


 	<div id="wrapper">
 		<h2>Добро пожаловать на мой форум</h2>
 		<p>Форум находится на стадии разработки.<a href="reg.php" id="reg">Регистрация</a></p>
	<?php
		if (!isset($_SESSION['uid'])) {
			echo "<form action='login_parse.php' method='post'>

			Имя пользователя: <input type='text' name='username'>&nbsp;
			Пароль: <input type='password' name='password'>&nbsp;
			<input type='submit' name='submit' value='Войти'>";
		}
		else {
			echo "<p> Вы зашли под ником<br><b>".$_SESSION['username']."</b>
				<a href='logout_parse.php'><br><button>Выйти</button></a>";
			}
?>

	</div>
	<div id="content">
<?php
	include_once("connect.php");
	$sql = "SELECT * FROM categories ORDER BY category_title ASC";
	$res = mysql_query($sql) or die(mysql_error());
	$categories = "";
	if (mysql_num_rows($res) > 0) {
		while ($row = mysql_fetch_assoc($res)) {
			$id = $row['id'];
			$title = $row['category_title'];
			$description = $row['category_description'];
			$categories .= "<a href='view_category.php?cid=".$id."' class='cat_links'>".$title." - <font size='-1'>".$description."</font></a>";
		}
		echo $categories;
	}

	else {
		echo "<p>Нет доступных категорий.</p>";
	}

?>

</div>
</body>
</html>