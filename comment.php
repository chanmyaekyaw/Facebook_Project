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
		<div class="col-md-1"></div>
		<div class="col-md-5">
<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$_SESSION['pid']=$id;
		$sql1=mysqli_query($conn,"SELECT post.*,user.name,user.photo FROM post INNER JOIN user ON post.user_id=user.id WHERE post.id='$id'");
$post=mysqli_fetch_assoc($sql1);
?>
			<div class="card mb-2">
				<div class="card-header bg-white">			
					<img src="img/<?php echo $post['photo'] ?>" width="30px" class="rounded-circle mr-1">
					<b><?php echo $post['name']; ?></b>				
				</div>
				<div class="card-body">
					<h6><?php echo $post['title']; ?></h6>
					<p class="text-justify"><?php echo $post['description'] ?></p>
					<?php if($post['post_photo']){ ?>
					<img src="img/<?php echo $post['post_photo'] ?>" width="100%;">
				<?php } ?>
				</div>
				
			</div>
		<?php } ?>
		</div>
	<div class="col-md-5">
		<div class="bg-light">
			<div class="comment-area" style="height: 300px;overflow: auto;">
				
				
			</div>
		<div class="media mb-2">
			  <div class="media-left">
			    <img src="img/<?php echo $user['photo'] ?>" class="media-object rounded-circle m-2" style="width:35px">
			  </div>
			  <div class="media-body">
			  	<input type="hidden" class="post_id" value="<?php echo $id; ?>">
			  	<input type="hidden" class="user_id" value="<?php echo $_SESSION['id']; ?>">
			    <input type="" class="form-control my-2 comment" placeholder="Comment Here">
			    <button class="btn btn-info btn-sm cbtn">Send</button>
			  </div>
			</div>
		</div>
	</div>	
	</div>
</div>
<script type="text/javascript">
	$('.cbtn').click(function(){
		var post_id=$('.post_id').val();
		var user_id=$('.user_id').val();
		var comment=$('.comment').val();
		$.ajax({
			url:"comment/insert.php",
			type:"POST",
			data:{post_id:post_id,user_id:user_id,comment:comment},
			success:function(data)
			{
				$('.comment').val("");
			}
		});
	});

	$(document).ready(function(){
		$('.comment-area').load('comment/select.php');
			commentRefresh();
	});

	function commentRefresh()
	{
		setTimeout(function(){
			$('.comment-area').load('comment/select.php');
			commentRefresh();
		},1000);
	}
</script>
</body>
</html>