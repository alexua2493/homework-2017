<?php
session_start();
require_once 'db.php';


 
$items    = array();
$allItems_count = 0;
$html     = NULL;
$limit    = 4;
$pageCount = 0;
 
$start    = isset($_GET['page'])   ? intval( $_GET['page'] )   : 0 ;
if ($_GET['sort'] == "new") {
	$sql = $link->query("SELECT post.* , group_concat(tag.tag_title) as tags FROM post LEFT JOIN post_to_tag USING (post_id) LEFT JOIN tag USING (tag_id) group by post.post_id  LIMIT $start,$limit ");
} else $sql = $link->query("SELECT post.* , group_concat(tag.tag_title) as tags FROM post LEFT JOIN post_to_tag USING (post_id) LEFT JOIN tag USING (tag_id) group by post.post_id DESC LIMIT $start,$limit ");

 
$res_select = $sql->fetchAll(PDO::FETCH_ASSOC);

if( is_array($items) ) {
     
    for($i=0;$i<count($res_select);$i++) { ?>
         
        	<div class="note">
				<p>
					<span class="date"><?=$res_select[$i]['post_create_datetime'];?></span>
					<a href="include/note.php?id=<?=$res_select[$i]['post_id']?>"><?=$res_select[$i]['post_title'];?></a>
				</p>
				<p>
					<?=$res_select[$i]['post_min_text'];?>
				</p>
				<?php if ($res_select[$i]['tags']) {
					     $value['tags'] = explode(',', $res_select[$i]['tags']);
					     foreach ($value['tags'] as $tag) {
					     	    ?>
                                  <span class="print_tag">
                                        <a href='include/posttotag.php?tag=<?=$tag?>'><?="#".$tag?></a>
                                  </span>
					     <?php  } ?>  
				<?php } ?>
                <?php if($_SESSION['logined']):?> 
				<p class="nav">
					<a href="index.php?page=<?=$res_select[$i]['post_id']?>&del=<?=$res_select[$i]['post_id']?>">удалить</a> |
					<a href="include/edit.php?id=<?=$res_select[$i]['post_id']?>">редактировать</a>
				</p>
                <?php endif;?>
			</div>
     <?php    
    }
     
}
 

$sql_count = $link ->query("SELECT COUNT(post_id) AS count FROM post");
$allItems_count = $sql_count->fetch(PDO::FETCH_OBJ)->count;
 

$pageCount = ceil( $allItems_count / $limit);

for( $i = 0; $i < $pageCount; $i++ ) {    
    $html .= '<li><a href="index.php?page=' . ($i * $limit)  . '">' . ($i + 1)  . '</a></li>';
}

echo '<ul class="pagination">' . $html . '</ul>';