<?php 
require "header.php";
?>
<style type="text/css">
	body{
		background: #D3D3D3;
	}
</style>
    <!-- Page Content -->
    <div class="container-flued ieditor-workspace">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="edit-area" id="editArea">
					<div class="upload-btn">
						<input type="file" class="form-control" id="uploadPhoto" >
					</div>
					<svg id="mainSvg" viewBox="0 0 1000 1000" style="border:0px solid red"  preserveAspectRatio="none">
						
					</svg>
	
				</div>
				
			</div>
			<div class="side-panel" id="sidePanel">

				<div class="effect-area">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
					<img src="assets/5.png" alt="" class="effect-img">
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="tool-area container-flued">
					<div class="btn btn-info" onclick="actionCrop()"><i class="fa fa-crop"></i><small class="d-none d-sm-block">Crop</small></div>
					<div class="btn btn-info" onclick="actionResize()"><i class="fa fa-expand-arrows-alt"></i><small class="d-none d-sm-block">Resize</small></div>
					<div class="btn  btn-info" data-toggle="modal" data-target="#clipartModel"><i class="fa fa-asterisk"></i><small class="d-none d-sm-block">Clipart</small></div>
					<div class="btn  btn-info" data-toggle="modal" data-target="#frameModel"><i class="far fa-square"></i><small class="d-none d-sm-block">Frame</small></div>
					<div class="btn btn-info" onclick="actionText()"><i class="fa fa-font"></i><small class="d-none d-sm-block">Add Text</small></div>
					<div class="btn btn-success" onclick="actionDownload()"><i class="fa fa-download"></i><small class="d-none d-sm-block">Download</small></div>
					<div class="btn btn-success" onclick="actionSave()"><i class="fa fa-save"></i><small class="d-none d-sm-block">Save</small></div>
				

				<div class="float-right" id="sidePanelToggle" data-on=""><i class="fa fa-star" style="font-size:30px;"></i></div>
			</div>

         	
        
		</div>
	</div>
 
 <!-- Modal -->
          <div class="modal fade" id="frameModel" role="dialog" style="width:100%; height:95%;">
            <div class="modal-dialog" style="max-width:100%;text-align:center;height:100%;">
    
              <!-- Modal content-->
              <div class="modal-content" style="height:100%;">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Frames</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="frameBody">
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
      
            </div>
          </div>


          
          <!-- Modal -->
          <div class="modal fade" id="clipartModel" role="dialog"  style="width:100%;height:95%;">
            <div class="modal-dialog" style="max-width:100%;text-align:center;height:100%;">
    
              <!-- Modal content-->
              <div class="modal-content" style="height:100%;">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Cliparts</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="clipartBody" >
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
      
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="resizeModel" role="dialog">
            <div class="modal-dialog" >
    
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Resize</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <h2>Old Height x Width:</h2>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="number" id="oldHeight" /> 
                        </div>
                         <div class="col-6">
                            <input class="form-control" type="number" id="oldWidth" />
                        </div>
                    </div>
                    <h2>new Height x Width:</h2>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="number" id="newHeight" /> 
                        </div>
                         <div class="col-6">
                            <input class="form-control" type="number" id="newWidth" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <br />
                            <button class="btn btn-primary" id="btnResizeNow">Resize</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
      
            </div>
          </div>
           
           <!-- Modal -->
          <div class="modal fade" id="cropModel" role="dialog">
            <div class="modal-dialog">
    
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Crop</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="Div3">
                     <h2>set values:</h2>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="number" id="cropX1"  placeholder="Top Left"/> 
                        </div>
                         <div class="col-6">
                            <input class="form-control" type="number" id="cropY1"  placeholder="Top Right" />
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="number" id="cropX2"  placeholder="Bottom Left" /> 
                        </div>
                         <div class="col-6">
                            <input class="form-control" type="number" id="cropY2"   placeholder="Bottom Right"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <br />
                            <button class="btn btn-primary" id="btnCropNow">Crop</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
      
            </div>
          </div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/snap-svg/snap.svg.js"></script>

<script src="js/ieditor-function.js"></script>
<script src="js/ieditor.js"></script>
