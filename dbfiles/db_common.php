<?php 
require_once "db.php";
function dbNextId($tableName,$pk){
	$rs=sql_query("select max({$pk}) as max from {$tableName}");
	//print_r($rs);
	if($rs[0]["max"]){
		return $rs[0]["max"]+1;
	}else{
		return 0;
	}
}


?>