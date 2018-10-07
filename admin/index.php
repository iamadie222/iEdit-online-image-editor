<?php
require "../dbfiles/db.php";
require "header.php";
$total_users=sql_query("select count(id) as total from users")[0]['total'];
$total_user_photos=sql_query("select count(id) as total from user_photos")[0]['total'];
?>

	
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
        <div class="card text-white bg-primary mb-3" style="max-width: 10rem;">
		  <div class="card-header">Total Users</div>
		  <div class="card-body">
		    <span style="font-size:50px;color:green;"><a href="users.php" class="text-white"><?php echo $total_users; ?></a></span>
		  </div>
		</div>  

		<div class="card text-white bg-success mb-3" style="max-width: 10rem;">
		  <div class="card-header">Photos Edited By Users</div>
		  <div class="card-body">
		    <span style="font-size:50px;color:green;"><a href="user_photos.php" class="text-white"><?php echo $total_user_photos; ?></a></span>
		  </div>
		</div>     
    </main>


<?php 
require "footer.php";
?>