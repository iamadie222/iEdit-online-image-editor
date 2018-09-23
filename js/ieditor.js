window.mainSvg=document.getElementById("mainSvg");
window.sidePanel=document.getElementById("sidePanel");
window.editArea=document.getElementById("editArea");

$(document).ready(function(){
	createIE();
	$("#uploadPhoto").change(onUploadPhoto);
	$("#sidePanelToggle").click(onSidePanelToggle);
    $("#btnResizeNow").click(btnResizeClick);
    $("#btnCropNow").click(btnCropClick);
    $("#cropModel").on('shown.bs.modal',modelCropShown);
    $("#resizeModel").on('shown.bs.modal',modelResizeShown);
    loadAssets();
    if(user_photo!= -1){
    	loadUserPhoto();
    }
});

function createIE(){
	window.ie=new iEditor($("#mainSvg")[0]);
	ie.setOnElementSelected(function(selectedSvg){
		var sType=$(selectedSvg).attr("data-type");
		if(sType=="25"){
			$("#fullColorPicker").spectrum("enable");
			$("#fontPicker")[0].disabled=false;
		}
		else{
			$("#fullColorPicker").spectrum("disable");
			$("#fontPicker")[0].disabled=true;
		}
		if(selectedSvg==null){
			$("#svgControls")[0].disabled=true;
		}
		else{
			$("#svgControls")[0].disabled=false;
		}
	});
}
function modelCropShown(){
    
}
function modelResizeShown(){
    $("#oldHeight").val(Snap(mainSvg).attr("height"))
    $("#oldWidth").val(Snap(mainSvg).attr("width"))
}
function btnCropClick(){
    crop($("#cropX1").val(),$("#cropY1").val(),$("#cropX2").val(),$("#cropY2").val());
    $("#cropModel").modal("hide");
}
function btnResizeClick(){
    resize($("#newHeight").val(),$("#newWidth").val());
    $("#resizeModel").modal("hide");
}

/*action functions*/

function actionCrop(){
    $("#cropModel").modal("show");
}
function actionResize(){
    if(!isLoaded()){
        notie.alert({ text: "Choose photo first", type: 2 });
        return;
    }
    $("#resizeModel").modal("show");
}
function actionClipart(){
    sidePanelOn();

}
function actionFrame(){
    sidePanelOn();
}
function actionText(){
    var pText=prompt("Text to insert");
    ie.addText(pText);
}
function actionDownload(){
    if(!isLoaded()){
        notie.alert({ text: "Choose photo first", type: 2 });
        return;
    } 
    getPngFromSvg($("#mainSvg")[0],mainSvg.height.baseVal.value,mainSvg.width.baseVal.value,function(imgUri){
        triggerDownload(imgUri,"image-ieditor.png");
    });
}
function actionSave(){
    if(!isLoaded()){
        notie.alert({ text: "Choose photo first", type: 2 });
        return;
    } 
    window.user_photo_name=prompt("Enter Name: ",window.user_photo_name);
    getPngFromSvg($("#mainSvg")[0],500,500,function(imgUri){
        $.ajax({
            url: "dataProvider.php",
            type: "POST",
            data:{
            	saveUserPhoto:"true",
                image: imgUri.replace('data:image/png;base64,', ''),
                svg: mainSvg.outerHTML,
                user_photo: window.user_photo,
                user_photo_name: window.user_photo_name
            },
            success:function(data){
                console.log(data);
                if(data.indexOf("success") >=0){
                    window.user_photo=data.split(":")[1];
                    notie.alert({ text: "Image Saved Successfully", type: 1 });
                }
                else if(data=="missingData"){
                	notie.alert({ text: "Some Problem with Image", type: 3 });
                }
                else if(data=="problemSavingFile"){
                	notie.alert({ text: "Can't write file", type: 3 });
                }
                else if(data=="problemInsertingDb"){
                	notie.alert({ text: "Can't Insert Record to Database", type: 3 });
                }
                else{
                    notie.alert({ text: "Unexpected Error", type: 3 });
                }
                
            },
            error:function(err){
            	notie.alert({ text: "Problem With Request", type: 3 });
                console.log(err.responseText);
            }
        });
    });    
}
/*action functions*/

function insertClipart(e){
	window.ee=e;
    if(!isLoaded()){
        notie.alert({ text: "Choose photo first", type: 2 });
        return;
    }   
    $("#clipartModel").modal("hide");
 
    getDataUri(e.src,function(imgUri){
        //console.log(imgUri);
        window.tSvg=document.createElementNS("http://www.w3.org/2000/svg","svg");
        Snap(tSvg).attr({height: 150,width:200,viewBox:"0 0 200 150"});
        Snap(tSvg).image(imgUri,0,0,200,150);
        ie.addSvgData(tSvg.outerHTML);
    });
}
function insertFrame(e){
    if(!isLoaded()){
        notie.alert({ text: "Choose photo first", type: 2 });
        return;
    }   
    $("#frameModel").modal("hide");
   
    getDataUri(e.src,function(imgUri){
        //console.log(imgUri);
        window.tSvg=document.createElementNS("http://www.w3.org/2000/svg","svg");
        Snap(tSvg).image(imgUri,0,0,200,150);
        Snap(tSvg).attr({height:500,width:500,viewBox:"0 0 500 500",x:0,y:0});
        ie.addSvgData(tSvg);
    });
}
function isLoaded(){
    if($(mainSvg).data("loaded")=="1"){
        return true;
    }
    return false;
}

function loadUserPhoto(){
	$.ajax({
        url: "dataProvider.php",
        type:"POST",
        data:{
            getUserPhoto: "true",
            user_photo: window.user_photo
        },
        success:function(data){
        	if(data !="notFound"){
        		var jData=JSON.parse(data);
        		window.user_photo_name=jData[0].name;
        		loadSvg(jData[0].id);
        	}
        	console.log(data,"up");
        },
        error:function(err){
            console.log(err.responseText);
        }
    });
}
function loadSvg(id){
	$.ajax({
        url: "user_photos/svg/"+id+".svg",
        dataType:"text",
        data:{
        },
        success:function(data){
        	mainSvg.parentElement.innerHTML=data;
        	createIE();
        	window.mainSvg=document.getElementById("mainSvg");
        	$(mainSvg).data("loaded","1");
        },
        error:function(err){
            console.log(err.responseText);
        }
    });
}

function loadAssets(){
    $.ajax({
        url: "dataProvider.php",
        data:{
            listCliparts: "true"
        },
        success:function(data){
            window.allCliparts=JSON.parse(data);
            $("#clipartBody").empty();
            for(c of allCliparts){
                $("#clipartBody").append("<div class='asset-item'><img src='assets/"+c.id+".png' onclick='insertClipart(this)' data-id='"+c.id+"'></div>");
            }
            
        },
        error:function(err){
            console.log(err.responseText);
        }
    });
    $.ajax({
        url: "dataProvider.php",
        data:{
            listFrames: "true"
        },
        success:function(data){
            window.allFrames=JSON.parse(data);
             $("#frameBody").empty();
            for(c of allFrames){
                $("#frameBody").append("<div class='asset-item'><img src='assets/"+c.id+".png' onclick='insertFrame(this)' data-id='"+c.id+"'></div>");
            }
        },
        error:function(err){
            console.log(err.responseText);
        }
    });
}
function onSidePanelToggle(){
	if(!Boolean($(this).attr("data-on"))){
		sidePanelOn();
	}
	else{
	    sidePanelOff();	
		
	}
	
}
function sidePanelOn(){
    sidePanel.style.right="0px";
	$(this).attr("data-on","true");
}
function sidePanelOff(){
    sidePanel.style.right="-300px";
	$(this).attr("data-on","");
}
function onUploadPhoto(){
	var r=new FileReader();
	r.readAsDataURL(this.files[0]);
	$(this).hide();
	r.onload=function(d){
		var img=document.createElement("img");
		img.src=d.target.result;
		img.onload=function(){
			window.i=img;
		//console.log(img.height,img.width)
		ie.addBackgroundImg(d.target.result,img.height,img.width);

		}
		

	}
}
function addText(){
	var pt=prompt("Insert Text");
	if(!pt){
		ie.addText(pt);
	}
	
}
function addFrame(){

}
function crop(x1,y1,x2,y2){
    Snap(mainSvg).attr("viewBox",""+x1+" "+y1+" "+x2+" "+y2);
    resize(x2-x1,y2-y1);
}
function resize(h,w){
    Snap(mainSvg).attr("height",h);
    Snap(mainSvg).attr("width",w);
    //Snap(mainSvg).attr("viewBox","0 0 "+ w+" "+ h);
}

function getDataUri(url, callback) {
    var image = new Image();

    image.onload = function () {
        var canvas = document.createElement('canvas');
        canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
        canvas.height = this.naturalHeight; // or 'height' if you want a special/scaled size

        canvas.getContext('2d').drawImage(this, 0, 0);

        // Get raw image data
        callback(canvas.toDataURL('image/png').replace(/^data:image\/(png|jpg);base64,/, ''));

        // ... or get as Data URI
        callback(canvas.toDataURL('image/png'));
    };

    image.src = url;
}
