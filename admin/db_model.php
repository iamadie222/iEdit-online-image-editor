<?php
include "../db.php";

//Insert Assets -----------------------------------------------------
if(isset($_POST['in_assets'])){
	$name=filter_data($_POST['name']);
	$type=filter_data($_POST['type']);
	$temp=sql_query("select max(id) as id from assets");
	$next_id=(int)$temp[0]['id']+1;
	
	if(isset($_FILES['image'])){
			
	  $errors= array();
	  $file_name = $_FILES['image']['name'];
	  $file_size =$_FILES['image']['size'];
	  $file_tmp =$_FILES['image']['tmp_name'];
	  $file_type=$_FILES['image']['type'];
	  //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
	  
	  
	  
	  if($file_size > 2097152){
		 $errors[]='File size must be excately 2 MB';
	  }
	  
	  if(empty($errors)==true){
		$res=move_uploaded_file($file_tmp,"../assets/".$next_id.".png");
		if(!$res){
			
		}
		
	  }else{
	  	
		 header("Location: cliparts.php?error=".$errors[0]);
	  }
	}
	$res=sql_nonquery("insert into assets (id,name,type) values ({$next_id},'{$name}','{$type}')");
	if(!$res){
		if($type=='clipart'){
			header("Location: cliparts.php?error=".$res);
			exit;
		}
		else{
			header("Location: frames.php?error=".$res);
			exit;
		}
	}
	if($type=='clipart'){
		header("Location: cliparts.php");
		exit;
	}
	else{
		header("Location: frames.php");
		exit;
	}
	
}
//Update Assets -----------------------------------------------------
else if(isset($_POST['update_assets'])){
	$name=filter_data($_POST['name']);
	$type=filter_data($_POST['type']);
	$id=filter_data($_POST['id']);

	if(isset($_FILES['image'])){
			
	  $errors= array();
	  $file_name = $_FILES['image']['name'];
	  $file_size =$_FILES['image']['size'];
	  $file_tmp =$_FILES['image']['tmp_name'];
	  $file_type=$_FILES['image']['type'];
	  //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
	  
	  
	  if($file_size > 2097152){
		 $errors[]='File size must be excately 2 MB';
	  }
	  
	  if(empty($errors)==true){
	  	
	  	
		$res=move_uploaded_file($file_tmp,"../assets/".$id.".png");
		if(!$res){
			
		}
		
	  }else{
		 header("Location: cliparts.php?error=".$errors[0]);
	  }
	}
	$res=sql_nonquery("insert into assets (name,type) values ('{$name}','{$type}')");
	if(!$res){
		if($type=='clipart'){
			header("Location: cliparts.php?error=".$res);
			exit;
		}
		else{
			header("Location: frames.php?error=".$res);
			exit;
		}
	}
	if($type=='clipart'){
		header("Location: cliparts.php");
		exit;
	}
	else{
		header("Location: frames.php");
		exit;
	}
}
//Delete Assets -----------------------------------------------------
else if(isset($_GET['delete_assets'])){
	$id=filter_data($_GET['id']);
	$res=sql_nonquery("delete from assets where id=".$id);
	if(!$res){
		
		header("Location: {$_SERVER['HTTP_REFERER']}?error=".$res);
		exit;
	
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
	exit;
}

//Insert Assets -----------------------------------------------------
else if(isset($_POST['in_assets'])){
	$name=filter_data($_POST['name']);
	$type=filter_data($_POST['type']);
}


function filter_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>