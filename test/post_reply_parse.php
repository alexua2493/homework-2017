<?php 
session_start();
if ($_SESSION['uid']) {
	if (isset($_POST['reply_submit'])) {
		include_once("connect.php");
		$creator = $_SESSION['uid'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		$res = mysql_query($sql) or die(mysql_error());
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = mysql_query($sql2) or die(mysql_error());
		$sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = mysql_query($sql3) or die(mysql_error());

		// Email Sending

		if (($res) && ($res2) && ($res3)) {
			echo "<p>Ваше сообщение успешно отправлено. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Вернуться к теме. </a></p>";
		} else {
			echo "<p>Ошибка отправки сообщения. Попробуйте позже.</p>";
		}
	} else {
		exit();
	}

} else {
	exit();
}

?>