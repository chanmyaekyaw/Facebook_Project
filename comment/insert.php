<?php
include('../db.php');
if(isset($_POST))
{
	$post_id=$_POST['post_id'];
	$user_id=$_POST['user_id'];
	$comment=$_POST['comment'];
	mysqli_query($conn,"INSERT INTO comment(comment,user_id,post_id) VALUES ('$comment','$user_id','$post_id')");
}
?>