<?php
require "../db.php";
require "header.php";
?>

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    

          <h2>Users Photos
			
          </h2>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Image</th>
                  <th width="20%">Action</th>
                </tr>
              </thead>

              <tbody>
              	<?php 
              	$allCliparts=sql_query("select * from assets where type='clipart'");
              	foreach ($allCliparts as $key => $value) {
              		echo "<tr>
		                  <td>{$value['id']}</td>
		                  <td>{$value['name']}</td>
		                  <td>hmdlohar</td>
		                  <td><img src='../assets/{$value['id']}.png' style='width:100px;'></td>
		                  <td>";
		                  ?>
		                  <a class="btn-sm btn-primary" href="clipart_update.php?id=<?php echo $value['id']; ?>">View</a>
		                  <a class="btn-sm btn-danger" href="db_model.php?delete_assets=1&id=<?php echo $value['id']; ?>" >Delete</a>
		                  <?php
		                  echo "</td>
		                </tr>";
              	}
              ?>
                
                
              </tbody>
            </table>
          </div>
        </main>


<?php 
require "footer.php";
?>