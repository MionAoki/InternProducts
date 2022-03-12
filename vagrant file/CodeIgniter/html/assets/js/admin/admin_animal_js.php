<?php header('Content-Type: text/javascript; charset=UTF-8');?>

function delData(delid){
	document.getElementById("modalDelete").className = "modalBg modalBgOpen";
	document.getElementById("delid").value = delid;
	document.getElementById("delname").innerHTML = delid;
	
}
function delClose(){
	document.getElementById("modalDelete").className= "modalBg modalBgClose";
}

function show_img(sub_name){
	if(sub_name == ""){
	 sub_name = "toppy.jpg";
	}
	document.getElementById("preview").setAttribute("src", "http://192.168.33.10/assets/img/"+sub_name);
}



