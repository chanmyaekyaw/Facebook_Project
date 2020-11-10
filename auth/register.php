<?php
include ('../db.php');
if(isset($_POST))
{
	$name=$_POST['name'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	// echo $password;
	// echo hash('md5', $password); //password ko thu myrr m myin ag
	// echo $gender;
	$photo=$_FILES['photo']['name'];
	// $photo=$_FILES['photo']['size'];
	// $photo=$_FILES['photo']['type'];
	// echo $photo;
	$tmp=$_FILES['photo']['tmp_name'];
	if($photo)
	{
		move_uploaded_file($tmp, "../img/$photo");
	}
	$sql=mysqli_query($conn,"SELECT * FROM user WHERE name='$name'");
	if(mysqli_num_rows($sql)>0)
	{
		//already exit
		echo "<script>alert('Username already exist!');window.location.href='../index.php'</script>";
	}else if($password==$cpassword && $photo!="") //!="" so tr photo par lar yin
	{
		//insert
		mysqli_query($conn,"INSERT INTO user (name,password,cpassword,email,phone,dob,gender,photo,address,created_date,modified_date) VALUES ('$name','$password','$cpassword','$email','$phone','$dob','$gender','$photo','$address',now(),now())");
		echo "<script>alert('Successfully Registered, Please Login!');window.location.href='../index.php'</script>";
	}else if($password==$cpassword && $photo==""){ //photo ma pr loh shi yin
		mysqli_query($conn,"INSERT INTO user (name,password,cpassword,email,phone,dob,gender,photo,address,created_date,modified_date) VALUES ('$name','$password','$cpassword','$email','$phone','$dob','$gender','empty.png','$address',now(),now())");
		echo "<script>alert('Successfully Registered, Please Login!');window.location.href='../index.php'</script>";
	}else{
		//passwords do not match
		echo "<script>alert('Passwords do not match!');window.location.href='../index.php'</script>";

	}
}
?>