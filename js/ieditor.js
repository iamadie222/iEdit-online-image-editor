$(document).ready(function(){
	window.ie=new iEditor($("#mainSvg")[0]);
	$("#uploadPhoto").change(onUploadPhoto);
});

function onUploadPhoto(){
	var r=new FileReader();
	r.readAsDataURL(this.files[0]);
	$(this).hide();
	r.onload=function(d){
		var img=document.createElement("img");
		img.src=d.target.result;
		img.onload=function(){
			window.i=img;
		console.log(img.height,img.width)
		ie.addBackgroundImg(d.target.result,img.height,img.width);
		}
		

	}
}
function iEditor(currSvg){
	var snap=Snap(currSvg);
	iEditor.prototype.addBackgroundImg=function(src,height,width){
		window.te=snap.image(src,0,0,width,height);
		snap.node.style.height=height+"px";
		snap.node.style.width=width+"px";
		snap.attr({viewBox:"0 0 "+width+" "+height});
	}
}

