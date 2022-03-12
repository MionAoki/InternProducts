<?php header('Content-Type: text/javascript; charset=UTF-8');?>

window.onload = function(){
        if($("#purpose11").prop('checked')) {
                $('#other').show();
        }else{
                $('#other').hide();
        }
};

$('#purpose11').on('click', function(){
        $("#other").slideToggle(this.checked);
});


