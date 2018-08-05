<?php 
require "header.php";
?>


<div class="container">
	<h1 class="mt-4 mb-3">Login to iEdit
        <small></small>
      </h1>
	<div class="row">
        <div class="col-lg-8 mb-4">
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Username:</label>
                <input type="text" class="form-control" id="username" name="username" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
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