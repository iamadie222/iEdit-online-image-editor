<?php 
require "header.php";
?>
<div class="container">
	<h1 class="mt-4 mb-3">Register on iEdit
        <small></small>
      </h1>
	<div class="row">
        <div class="col-lg-8 mb-4">
          <form id="formRegister" method="POST">
            <div class="control-group form-group">
              <div class="controls">
                <label>Your Name:</label>
                <input type="text" class="form-control"  name="name" >
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Your Email:</label>
                <input type="text" class="form-control"  name="email">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" >
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>            
            <div class="control-group form-group">
              <div class="controls">
                <label>Retype Password:</label>
                <input type="password" class="form-control" name="repassword">
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary" >Register</button>
          </form>
        </div>

      
	</div>
</div>
      
<?php 
require "footer.php";
?>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#formRegister").validate({
		rules:{
			name: "required",
			email:{
				email:true,
				required: true
			},
			username: {
				required:true,
				minlength: 8
			},
			repassword:{
				required: true,
				minlength: 8,
				equalTo: "#password"
			},
			password:"required"
		},
		messages:{
			name: "Enter Name",
			email: {
				required: "Email is Required",
				email: "Enter Proper Email"
			},
			username: {
				required:'Username is Required',
				minlength: "Username must be atleast 8 latters"
			},
			repassword:{
				required: "Password is Required",
				minlength: "Password must be atleast 8 latters",
				equalTo: "Password and Retype password must match"
			},
			password:"Password is Required"
		}
	});
	$("#formRegister").submit(function(){
		var frm=this;	
		if($("#formRegister").valid()){
			$.ajax({
				url: "dataProvider.php",
				type:"POST",
				data:{
					register: "true",
					name: frm.elements.name.value,
					email: frm.elements.email.value,
					username: frm.elements.username.value,
					password: frm.elements.password.value
				},
				success:function(data){
					if(data=="success"){
						notie.alert({text: "You are not registered. You will be redirect to login page",type:1});
						setTimeout(function(){
							window.location.assign("login.php");
						},1000);
					}
					else{
						if(data=="missingData"){
							notie.alert({text: "Please Fill up form properly",type:3});
						}
						else{
							notie.alert({text: "Unexpected Error.",type:3});
						}
					}
				},
				error:function(err){
					console.log(err);
					return;
					console.log(err.responseText);
				}
			});		
			notie.alert({text: "here to submit form"});
		}
		
		return false;
	});
});
</script>
