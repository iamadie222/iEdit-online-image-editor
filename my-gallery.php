<?php 
require_once "header.php";
require_once "is_logged.php";
?>

<h2>My Gallery</h2>
	

      <div class="row">
      	<?php 
			$userPhotos=sql_query("select * from user_photos where user_id={$_SESSION['userLogged']}");
			foreach ($userPhotos as $key => $value) {
				echo '<div class="col-lg-4 col-sm-6 portfolio-item">
			          <div class="card h-100">
			            <a href="#"><img class="card-img-top" src="user_photos/png/'
			            .$value['id'].'.png" alt=""></a>
			            <div class="card-body">
			              <h4 class="card-title">
			                <a href="ieditor.php?user_photo='.$value['id'].'">Image name1</a>
			              </h4>
			            </div>
			          </div>
			        </div>';
			}

		?>
      </div>
      
<?php 
require "footer.php";
?>