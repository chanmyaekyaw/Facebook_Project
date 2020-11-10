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
	$sql2=mysqli_query($conn,"SELECT * FROM user WHERE id!='".$_SESSION['id']."'");
	$total=mysqli_num_rows($sql2);
	$limit=2; //no of friends list shown in 1 page
	$start=0;
	$page=ceil($total/$limit);
	// echo $page;
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$start=($id-1)*$limit; //formula htoke tr
	}else{		//home ko pyn twrr pee friends list ko win yin first page ko paw ag
		$id=1;  
	}
	$sql3=mysqli_query($conn,"SELECT * FROM user WHERE id!='".$_SESSION['id']."' LIMIT $start,$limit");
	while($friend=mysqli_fetch_assoc($sql3))
	{
		
			echo '<div class="media border mb-2">
			  <div class="media-left">
			    <img src="img/'.$friend['photo'].'" class="media-object rounded-circle m-2" style="width:60px">
			  </div>
			  <div class="media-body">
			    <h6 class="media-heading mt-3">'.$friend['name'].'</h6>
			    <button class="btn btn-info btn-sm mb-2 mbtn" to_mail='.$friend['email'].' data-toggle="modal" data-target="#mail_model">Send Mail</button>
			  </div>
			</div>';
	 } ?>
<ul class="pagination mt-5 justify-content-center">
	<?php if($id>1){ ?>
	<li class="page-item"><a href="?id=<?php echo $id-1; ?>" class="page-link">Previous</a></li>
	<?php } for($i=1;$i<=$page;$i++){ ?>
	<li class="page-item"><a href="?id=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li> 
	<?php } if($id!=$page){ ?>
	<li class="page-item"><a href="?id=<?php echo $id+1; ?>" class="page-link">Next</a></li>
<?php } ?>
</ul>
		</div>
	</div>
</div>
<!-- ........................Mail Model.................... -->
<div class="modal fade" id="mail_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i>Mail Form</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="mail.php">
        <input type="" name="to_mail" class="form-control to_mail mb-2" disabled>
        <input type="" name="from_mail" class="form-control from_mail mb-2" value="<?php echo $user['email'] ?>">
        <input type="" name="subject" class="form-control mb-2" placeholder="Enter Subject" autocomplete="off"> <!-- click yin old twy ma paw ag -->
        <textarea name="message" class="form-control mb-2" placeholder="Enter Message" rows="8"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-registered mr-1"></i>Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	$('.mbtn').click(function(){
		var to_mail=$(this).attr('to_mail');
		$('.to_mail').val(to_mail);
	});
</script>
</body>
</html>