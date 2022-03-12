<?php header('Content-Type: text/javascript; charset=UTF-8');?>

document.getElementById("account_menu").style.display ="none";
function menuOpen(){
	var menu = document.getElementById("account_menu");
	if(menu.style.display=="block"){
	 menu.style.display ="none";
	}else{
	 menu.style.display ="block";
	}
}

function logoutOpen(){
 document.getElementById("modalLogout").className = "modalBg modalBgOpen";
}
function logoutClose(){
 document.getElementById("modalLogout").className= "modalBg modalBgClose";
}


