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
			                <a href="ieditor.php?user_photo='.$value['id'].'">'.$value['name'].'</a>
			                <div class="btn btn-danger float-right" onclick="deleteUserPhoto('.$value['id'].',this)"><i class="fa fa-trash"></i><small class="d-none d-sm-block"></small></div>
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
<script type="text/javascript">
function deleteUserPhoto(id,e){
	notie.confirm({
		text: "Do you really want to delete this photo?",
		submitText :'Yes',
		cancelText:'No'
	},function(){
		deleteRequest(id,e);
	},function(){

	});
}
function deleteRequest(id,e){
	$.ajax({
        url: "dataProvider.php",
        type:"POST",
        data:{
            deleteUserPhoto: id
        },
        success:function(data){
        	if(data =="success"){
        		notie.alert({ text: "Image Deleted Successfully", type: 1 });
        		$(e).parents(".portfolio-item").remove()
        	}
        	else if(data=="notAllowed"){
        		notie.alert({ text: "Action not allowed", type: 3 });
        	}
        	
        },
        error:function(err){
            console.log(err.responseText);
        }
    });
}
</script>