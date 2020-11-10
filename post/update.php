<?php
include('../db.php');
if(isset($_POST))
{
	$id=$_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$photo=$_FILES['photo']['name'];
	$tmp=$_FILES['photo']['tmp_name'];
	if($photo)
	{
		move_uploaded_file($tmp, "../img/$photo");
		mysqli_query($conn,"UPDATE post SET title='$title',description='$description',post_photo='$photo',modified_date=now() WHERE id='$id'");
	}else{
		mysqli_query($conn,"UPDATE post SET title='$title',description='$description',modified_date=now() WHERE id='$id'");
	}
	header("location:../home.php");

}
?>