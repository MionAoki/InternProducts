<?php header('Content-Type: text/javascript; charset=UTF-8');?>

function change(){
	for(var i=0;i<document.getElementsByName('selected').length;i=i+1)
	{
	 if(document.getElementsByName('selected')[i].checked){
	 var checked_day = document.getElementsByName('selected')[i].value;
	 }
	}

	var checked_data =
        {
                checked_day: checked_day,
                ajax: "1"
        };

        $.ajax({
        url: "http://192.168.33.10/index.php/admin_timetable/editmenu",
        type: "POST",
        data: checked_data
        }).done(function(msg)
        {
         $("#timetable").html(msg);
        });

        return false;
};


function delData(delid){
        document.getElementById("modalDelete").className = "modalBg modalBgOpen";
        document.getElementById("delid").value = delid;

}
function delClose(){
        document.getElementById("modalDelete").className= "modalBg modalBgClose";
}


