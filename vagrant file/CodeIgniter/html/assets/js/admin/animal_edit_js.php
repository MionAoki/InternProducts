<?php header('Content-Type: text/javascript; charset=UTF-8');?>

var i = 0;
$('#add_tagform').on('click', function(){
        i = i + 1;

        var input_data = document.createElement('input');
        input_data.type = 'text';
        input_data.id = 'add_tag'+ i;
        input_data.name = 'new_tag' + i;
        input_data.className = 'form-control';
        var parent = document.getElementById('tag_parent');
        parent.appendChild(input_data);

        var button_data = document.createElement('button');
        button_data.id = i;
        button_data.className = 'btn btn-secondary';
        button_data.onclick = function(){deleteBtn(this);}
        button_data.innerHTML = '削除';
        var input_area = document.getElementById(input_data.id);
        parent.appendChild(button_data);

        document.getElementById("add_num").value = i;

});

function deleteBtn(target) {
        var target_id = target.id;
        var parent = document.getElementById('tag_parent');
        var ipt_id = document.getElementById('add_tag' + target_id);
        var tgt_id = document.getElementById(target_id);
        parent.removeChild(ipt_id);
        parent.removeChild(tgt_id);
}


$('input[id=picture]').change(function() {
    $('#photoCover').val($(this).prop('files')[0].name);
});
function no_choose(){
        document.getElementById("photoCover").value = "";
}

