<?php 
require "header.php";
?>
<div class="container">
	<h1 class="mt-4 mb-3">Register on iEdit
        <small></small>
      </h1>
	<div class="row">
        <div class="col-lg-8 mb-4">
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Your Name:</label>
                <input type="text" class="form-control"  name="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Your Email:</label>
                <input type="text" class="form-control"  name="email" required data-validation-required-message="Please enter your email.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <input type="password" class="form-control" name="password"  required>
              </div>
            </div>            
            <div class="control-group form-group">
              <div class="controls">
                <label>Retype Password:</label>
                <input type="password" class="form-control" name="repassword"  required>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Gender:</label>
                
                <input type="radio" class="form-control">Male
                <input type="radio" class="form-control">Female
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Date of Birth:</label>
                <input type="date" class="form-control"  name="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            
            
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Login</button>
          </form>
        </div>

      
	</div>
</div>
      
<?php 
require "footer.php";
?>