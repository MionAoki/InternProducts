<?php header('Content-Type: text/javascript; charset=UTF-8');?>

function textcopy(){
 var target = document.getElementById("encry_pass");
 target.select();
 document.execCommand("copy");
 alert("copy completed");
}

