<?php 
include "db.php";

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
function filter_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>