<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('cdn.php'); ?>
</head>
<body>
<?php include('nav.php'); ?>
<div class="container">
	<div class="row mt-5 pt-4">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<?php 
			if(isset($_POST['name']))
			{
				$name=$_POST['name'];
				$sql=mysqli_query($conn,"SELECT * FROM user WHERE name LIKE '%$name%'");
				while($friend=mysqli_fetch_assoc($sql))
				{
					echo '<div class="media border mb-2">
			  <div class="media-left">
			    <img src="img/'.$friend['photo'].'" class="media-object rounded-circle m-2" style="width:60px">
			  </div>
			  <div class="media-body">
			    <h6 class="media-heading mt-3">'.$friend['name'].'</h6>
			  </div>
			</div>';
				}
			}
			 ?>

		</div>
	</div>
</div>
</body>
</html>