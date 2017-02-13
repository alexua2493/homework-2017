<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Мой Форум</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 	<div id="wrapper">
 		<h2>Мой блог</h2>
 		<p>создание блога...</p>
	<?php
		if (!isset($_SESSION['uid'])) {
			echo "<form action='login_parse.php' method='post'>
			Имя пользователя: <input type='text' name='username'>&nbsp;
			Пароль: <input type='password' name='password'>&nbsp;
			<input type='submit' name='submit' value='Войти'>
			";
		}
		else {
			echo "<p>Вы залогинены по ником:<br> ".$_SESSION['username']."<br><br>
				<a href='logout_parse.php'>Выйти</a>";
	}
?>

<hr>
<div id="content">
<?php
include_once("connect.php");
$cid = $_GET['cid'];
if (isset($_SESSION['uid'])) {
	$logged = " | <a href='create_topic.php?cid=".$cid."'>Нажмите здесь чтобы создать тему</a>";
} else {
	$logged = " | Пожалуйста зарегистрируйтесь чтобы создавать темы.";
}
$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
$res = mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($res) == 1) {
	$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
	$res2 = mysql_query($sql2) or die(mysql_error());
	if (mysql_num_rows($res2) > 0) {
		$topics .= "<table width='100%' style='border-collapse: collapse;'>";
		$topics .= "<tr><td colspan='3'><a href='index.php'>Вернуться на главную</a>".$logged."<hr></td></tr>";
		$topics .= "<tr style='background-color: #dddddd;'><td>Тема</td><td width='65' align='center'>сообщений</td><td width='65' align='center'>просмотров</td></tr>";
		$topics .= "<tr><td colspan='3'><hr></td></tr>";
		while ($row = mysql_fetch_assoc($res2)) {
			$tid = $row['id'];
			$title = $row['topic_title'];
			$views = $row['topic_views'];
			$date = $row['topic_date']; 
			$creator = $row['topic_creator'];
			$topics .= "<tr><td><a href ='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>0</td><td align='center'>".$views."</td></tr>";
			$topics .= "<tr><td colspan='3'><hr></td></tr>";
			}
			$topics .="</table>";
			echo $topics;
	} else {
		echo "<a href='index.php'>Вернуться на главную</a><hr>";
		echo "<p>В этой категории нет тем.".$logged."</p>";
	}
} else {
	echo "<a href='index.php'>Вернуться на главную</a><hr>";
	echo "<p>Вы пытаетесь посмотреть категорию которая не сущетвует.";
}
?>
</div>
</div>

</body>
</html>