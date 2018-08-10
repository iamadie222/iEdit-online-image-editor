<?php 
require "header.php";
?>

    <!-- Page Content -->
    <div class="container-flued ieditor-workspace">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="edit-area" id="editArea">
					<div class="upload-btn">
						<input type="file" id="uploadPhoto" >
					</div>
					<svg id="mainSvg" viewBox="0 0 1000 1000" style="border:0px solid red"  preserveAspectRatio="none">
						
					</svg>
	
				</div>
				
			</div>
			<div class="side-panel" id="sidePanel">
				<div class="effect-area">
					<div class="effict-grid container-flued">
						<div class="row">
							<div class="col"><img src="" class="effict-img"></div>
							<div class="col"><img src="" class="effict-img"></div>
						</div>
						<div class="row">
							<div class="col"><img src="" class="effict-img"></div>
							<div class="col"><img src="" class="effict-img"></div>
						</div>
						<div class="row">
							<div class="col"><img src="" class="effict-img"></div>
							<div class="col"><img src="" class="effict-img"></div>
						</div>
					</div>
				</div>
				<div id="textToolArea">
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="tool-area container-flued">
					<div class="tool "><i class="fa fa-crop"></i><small class="d-none d-sm-block">Crop</small></div>
					<div class="tool "><i class="fa fa-expand-arrows-alt"></i><small class="d-none d-sm-block">Resize</small></div>
					<div class="tool "><i class="fa fa-asterisk"></i><small class="d-none d-sm-block">Clipart</small></div>
					<div class="tool "><i class="far fa-square"></i><small class="d-none d-sm-block">Frame</small></div>
					<div class="tool "><i class="fa fa-font"></i><small class="d-none d-sm-block">Add Text</small></div>
				

				<div class="float-right" id="sidePanelToggle" data-on=""><i class="fa fa-star" style="font-size:30px;"></i></div>
			</div>

         	
        
		</div>
	</div>
 


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/snap-svg/snap.svg.js"></script>

<script src="js/ieditor.js"></script>
