<?php session_start(); ?>
<?php
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")) {
	header("Location: index.php");
	exit();
}
$cid = $_GET['cid'];
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
 	<h3>Обычно форум имеет возможность Поиска по своей базе сообщений.</h3>
 	<p>Большинство форумов имеет систему личных сообщений, позволяющую зарегистрированным пользователям общаться индивидуально, аналогично электронной почте.</p>


 	<?php
	echo "<p>Вы залогинены под ником:<br> ".$_SESSION['username']."<br><br><a href='logout_parse.php'>Выйти</a>";
 	?>

	<div id="content">
	<form action="create_topic_parse.php" method="post">
	<p>Тема сообщения</p>
	<input type="text" name="topic_title" size="98" maxlength="150">
	<p>Содержимое</p>
	<textarea name="topic_content" rows="5" cols="75"></textarea>
	<br><br>
	<input type="hidden" name="cid" value="<?php echo $cid; ?>">
	<input type="submit" name="topic_submit" value="Создать тему">
	</form>
</div>
</body>
</html>