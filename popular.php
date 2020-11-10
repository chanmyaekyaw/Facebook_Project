<?php
include('db.php');
$sql7=mysqli_query($conn,"SELECT * FROM like_data");
$a="";
while($popular=mysqli_fetch_assoc($sql7))
{
	$a.=$popular['post_id'].",";
}
//loop yk a pyin mr echo htoke lo ya ag $a.= yay
$b=substr($a, 0,-1);//$a nouk mr , 1 khu po tr ko cut lote tr
$c=explode(",", $b);
$d=array_count_values($c);
arsort($d); //array yk value ko descending(kye sin ngl lite) c tr
foreach ($d as $key => $value) {
	$sql6=mysqli_query($conn,"SELECT *,user.name,user.photo FROM post INNER JOIN user ON post.user_id=user.id WHERE post.id='$key'");
	$popular1=mysqli_fetch_assoc($sql6);
	echo $popular1['title']."<br>";

}

?>