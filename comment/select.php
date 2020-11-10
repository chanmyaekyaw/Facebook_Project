<?php
session_start();
include('../db.php');
$sql=mysqli_query($conn,"SELECT comment.*,user.name,user.photo FROM comment INNER JOIN user ON comment.user_id=user.id WHERE comment.post_id='".$_SESSION['pid']."'");
while($comment=mysqli_fetch_assoc($sql))
{
	echo '<div class="media mb-2">
			  <div class="media-left">
			    <img src="img/'.$comment['photo'].'" class="media-object rounded-circle m-2" style="width:35px">
			  </div>
			  <div class="media-body">
			    <h6 class="media-heading mt-3">'.$comment['name'].'</h6>
			    <p>'.$comment['comment'].'</p>
			  </div>
			</div>';
}
?>