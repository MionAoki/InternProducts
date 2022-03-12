<?php header('Content-Type: text/javascript; charset=UTF-8');?>


function delData(delname,delid){
        document.getElementById("modalDelete").className = "modalBg modalBgOpen";
	
	document.getElementById("delname").innerHTML = delname; //delname:確認表示用
	
        document.getElementById("delid").value = delid; //delid.value:送信内容
}
function delClose(){
        document.getElementById("modalDelete").className= "modalBg modalBgClose";
}

