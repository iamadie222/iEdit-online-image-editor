<?php 
include "dbfiles/db.php";
include "dbfiles/db_common.php";

//Register User -----------------------------------------------------
if(isset($_POST['register'])){
	$name=filter_data($_POST['name']);
	$username=filter_data($_POST['username']);
	$email=filter_data($_POST['email']);
	$password=filter_data($_POST['password']);
	if(empty($name) || empty($username) ||empty($email)||empty($password)){
		echo "missingData";
		return;
	}
	$passwd=md5($password);
	$res=sql_nonquery("insert into users (name,username,email,password) values ('{$name}','{$username}','{$email}','{$passwd}')");
	if($res==1){
		echo "success";
	}
	else{
		echo "problemInserting";
	}
}

//Login Authentication -----------------------------------------------------
else if(isset($_POST['login'])){
	
	$username=filter_data($_POST['username']);
	$password=filter_data($_POST['password']);
	$passwd=md5($password);
	$rs=sql_query("select * from users where username='{$username}'");
	if(count($rs)==0){
		echo "userNotFound";
	}
	else{
		if($rs[0]['password']==$passwd){
			$_SESSION['userLogged']=$rs[0]['id'];
			echo "success";

		}
		else{
			echo "passwordDoNotMatch";
		}
	}
}

//Update User's Profile -----------------------------------------------------
else if(isset($_GET['user_profile'])){

}

//Register User -----------------------------------------------------
else if(isset($_GET['register'])){

}
else if(isset($_GET['listCliparts'])){
	$rs=sql_query("select * from assets where type='clipart'");
	echo json_encode($rs);
}
else if(isset($_GET['listFrames'])){
	$rs=sql_query("select * from assets where type='frame'");
	echo json_encode($rs);
}
else if(isset($_POST['saveUserPhoto'])){
	$user_photo=filter_data($_POST['user_photo']);
	$user_photo_name=filter_data($_POST['user_photo_name']);
	$image=$_POST['image'];

	if($user_photo== "-1" ){
		$nextId=dbNextId("user_photos","id");
		$user_photo=$nextId;
	}
	
	$inDb=sql_nonquery("insert into user_photos (id,name,user_id,status) values ({$user_photo},'{$user_photo_name}',{$_SESSION['userLogged']},1)");
	if($inDb){

	}
	else{
		
	}
	
	
}
function filter_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>