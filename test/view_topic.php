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
} else {
	echo "<p>Вы залогинены как<br> ".$_SESSION['username']."<br><br> <a href='logout_parse.php'>Выйти</a>";
}
?>

<div id="content">
<?php  
include_once("connect.php");
$cid = $_GET['cid'];
$tid = $_GET['tid'];
$sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
$res = mysql_query($sql) or die(mysql_error());




if (mysql_num_rows($res) == 1) {
	echo "<table width='100%'>";
	if ($_SESSION['uid']) { echo "<tr><td colspan='2'><input type='submit' value='Написать сообщение' onClick=\"window.location =
		'post_reply.php?cid=".$cid."&tid=".$tid."'\" ><hr>"; } else { echo "<tr><td colspan='2'><p>Пожалуйста войдите чтобы оставлять сообщения.</p><hr></td></tr>"; }
	while ($row = mysql_fetch_assoc($res)) {
		$sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
		$res2 = mysql_query($sql2) or die (mysql_error());
		while ($row2 = mysql_fetch_assoc($res2)) {
			echo "<tr><td valign='top' style='border: 1px solid #000000;'><div style='min-height: 125px;'>".$row['topic_title']."<br>
			by ".$row2['post_creator']." - ".$row2['post_date']."<hr>".$row2['post_content']."</div></td><td width='200' valign='top'
			align='center' style='border': 1px solid #000000;'>Информация о пользователе</td></tr><tr><td colspan='2'><hr></td></tr>";
		}



		$old_views = $row['topic_views'];
		$new_views = $old_views + 1;
		$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id ='".$tid."' LIMIT 1";
		$res3 = mysql_query($sql3) or die(mysql_error());

		
	}
} else {
	echo "<p>Тема не существует.</p>";
}
?>

</div>
</div>

</body>
</html> 