<?php
session_start();
include('db.php');
$sql=mysqli_query($conn,"SELECT user.name,user.photo FROM online_user INNER JOIN user ON online_user.user_id=user.id WHERE user.id != '".$_SESSION['id']."'");
while($row=mysqli_fetch_assoc($sql))
{
	echo '<li class="list-group-item"><img src="img/'.$row['photo'].'" class="rounded-circle mr-1" width="35"><i>'.$row['name'].'</i></li>';
}
?>