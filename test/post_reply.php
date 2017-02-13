<?php session_start(); ?>
<?php
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")) {
	header("Location: index.php");
	exit();
}
$cid = $_GET['cid'];
$tid = $_GET['tid'];
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

 	<?php
	echo "<p>Вы залогинены как<br> ".$_SESSION['username']."<br><br> <a href='logout_parse.php'>Выйти</a>";
 	?>


	<div id="content">
	<form action="post_reply_parse.php" method="post">
	<p>Reply Content</p>
	<textarea name="reply_content" rows="5" cols="75"></textarea><br><br>

	<input type="hidden" name="cid" value="<?php echo $cid; ?>">
	<input type="hidden" name="tid" value="<?php echo $tid; ?>">
	<input type="submit" name="reply_submit" value="Post Your Reply">
	</form>
</div>
</body>
</html>