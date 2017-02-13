<?php
session_start();
require_once 'db.php';
require_once 'valid.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Результаты поиска</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/styless.css">
	</head>
	<body>
	        <div id="login_form" style="margin-right: 50px; text-align: right; ">
	          <?php if (!$_SESSION['logined']):?>
                    <p class="error"><?=$error_login;?></p>
                    <form action="" method="post" class="admin">
                          <input type="text" name="name" placeholder="Введите имя">
                          <input type="password" name="password" placeholder="Введите пароль" class="pass">
                          <input name="sub" type="submit" value="Отправить">
                    </form>
            </div>
            <div id="search" style="margin-right: 50px; text-align: right;>
              <?php else: echo "Welcome " . $_SESSION['user']. " ! ";?>
                    <a href='?exit' class="ex">Выход</a>
              <?php endif; ?>
	      	        <form method="post" action="search.php">
                         <input type="text" name="search_box" id="search_box" class='search_box'/>
                         <input type="submit" value="Поиск" class="search_button" /><br />
                    </form>

            </div>
	      </div>

		<div id="wrapper">
			<h1>Результаты поиска:</h1>
				<p class="nav">
				<a href="../index.php">на главную</a>
			    </p>
                 <?php

if( !empty($result_post_title) ) {
     
    for($i=0;$i<count($result_post_title);$i++) { ?>
         
        	<div class="note">
				<p>
					
					<a href="../include/note.php?id=<?=$result_post_title[$i]['post_id']?>"><?=$result_post_title[$i]['post_title'];?></a>
				</p>
			</div>
     <?php    
    }
     
} 
if( !empty($result_post) ) {
     
    for($i=0;$i<count($result_post);$i++) { ?>
         
        	<div class="note">
				<p>
                   <?=$result_post[$i]['post_text'];?>
                </p>
			</div>
     <?php    
    }
     
}

if( !empty($result_tag) ) {
     
    for($i=0;$i<count($result_tag);$i++) { ?>
         
        	<div class="note">
				<?php if ($result_tag[$i]['tag_title']) {
					     $value['tag_title'] = explode(',', $result_tag[$i]['tag_title']);
					     foreach ($value['tag_title'] as $tag) {
					     	    ?>
                                  <span class="print_tag">
                                        <a href='../include/posttotag.php?tag=<?=$result_tag[$i]['tag_title']?>'><?="#".$tag?></a>
                                  </span>
					     <?php  } ?>  
				<?php } ?>
			</div>
     <?php    
    }
     
}
                ?>
		</div>
	</body>
</html>


