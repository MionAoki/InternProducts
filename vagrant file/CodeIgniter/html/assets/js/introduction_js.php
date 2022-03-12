<?php header('Content-Type: text/javascript; charset=UTF-8');?>

function modalOpen(){
	document.getElementById("modalArea").className = "modalBg modalBgOpen";
}
function modalClose(){
        document.getElementById("modalArea").className= "modalBg modalBgClose";
}

function tableChange(){
	for(var i=0;i<document.getElementsByName('selectedday').length;i=i+1)
        {
         if(document.getElementsByName('selectedday')[i].checked){
         var checked_day = document.getElementsByName('selectedday')[i].value;
         }
        }
	var animal_id = document.getElementsByName("animal_id")[0].value;

        var checked_data =
        {
                checked_day: checked_day,
                ajax: "1"
        };

        $.ajax({
        url: "http://192.168.33.10/index.php/introduce/detail/"+animal_id,
        type: "POST",
        data: checked_data
        }).done(function(msg)
        {
        $("#changeTable").html(msg);
        });

        return false;
};

