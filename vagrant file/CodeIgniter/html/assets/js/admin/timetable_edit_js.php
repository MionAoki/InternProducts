<?php header('Content-Type: text/javascript; charset=UTF-8');?>

$('#add_form').on('click', function(){

	i = Number(document.getElementById("add_num").value) + 1;

	let table = document.getElementById('TTedit');
	let newRow = table.insertRow();

	let newCell = newRow.insertCell();
        let button_data = document.createElement('button');
	button_data.id = i;
	button_data.className = 'btn btn-dark';
	button_data.onclick = function(){deleteBtn(this);}
	button_data.innerHTML = '削除';
	newCell.appendChild(button_data);

	newCell = newRow.insertCell();
	input_data = document.createElement('input');
	input_data.type = 'time';
	input_data.name = 'sTime' + i;
	input_data.className = 'form-control';
	newCell.appendChild(input_data);
	
	newCell = newRow.insertCell();
	input_data = document.createElement('input');
	input_data.type = 'time';
        input_data.name = 'eTime' + i;
        input_data.className = 'form-control';
        newCell.appendChild(input_data);

	newCell = newRow.insertCell();
        input_data = document.createElement('input');
        input_data.type = 'text';
        input_data.name = 'filled_animal' + i;
        input_data.className = 'form-control';
        newCell.appendChild(input_data);

	document.getElementById("add_num").value = i;
});

function deleteBtn(target) {
	var table = document.getElementById('TTedit');
	var tr = target.parentNode.parentNode;
	tr.parentNode.deleteRow(tr.sectionRowIndex);
	var count = document.getElementById("add_num").value;
	document.getElementById("add_num").value = count - 1;
}


