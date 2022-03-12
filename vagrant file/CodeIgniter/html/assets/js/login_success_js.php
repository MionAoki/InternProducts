<?php header('Content-Type: text/javascript; charset=UTF-8');?>

function modalOpen(){
        document.getElementById("modalArea").className = "modalBg modalBgOpen";
}

function modalClose(){
        document.getElementById("modalArea").className= "modalBg modalBgClose";
}

function allcheck(tf){
        var list = document.getElementsByName("tag_search[]");
        var boxcount = document.getElementsByName("tag_search[]").length;
        for( i=0; i<boxcount; i=i+1){
         list[i].checked = tf;
        }
}

window.onload = function(){
	if(typeof document.getElementsByName("selected_tag")[0] === "object"){
	 var selected = document.getElementsByName("selected_tag")[0].value;
	 var requestbox = document.getElementsByName("tag_search[]");
         requestbox[selected-1].checked = true;
	}
}

$('#tag_search, #search').on('click', function(){
        var checked = [];
        $("[name='tag_search[]']:checked").each(function(){
         checked.push(this.value);
        });
	
	var search_data =
        {
        tag_data: checked,
        keyword: $("#keyword").val(),
        how_search: $('[name=how_search]:checked').val(),
        ajax: "1"
        };

        $.ajax(
        {
         url: "http://192.168.33.10/index.php/loggedin/search",
         type: "POST",
         data: search_data
        }).done(function(msg)
        {
         $("#main_content").html(msg);
        });
         return false;
});

