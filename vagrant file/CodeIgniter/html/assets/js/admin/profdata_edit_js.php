<?php header('Content-Type: text/javascript; charset=UTF-8');?>

$('#add_form').on('click', function(){
	let kind = document.getElementById('kind').value;

	i = Number(document.getElementById("add_num").value) + 1;

	let table = document.getElementById('table_edit');
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
        input_data.type = 'text';
        input_data.name = kind + i;
        input_data.className = 'form-control';
        newCell.appendChild(input_data);

	document.getElementById("add_num").value = i;
});

function deleteBtn(target) {
        var table = document.getElementById('table_edit');
        var tr = target.parentNode.parentNode;
        tr.parentNode.deleteRow(tr.sectionRowIndex);
        var count = document.getElementById("add_num").value;
        document.getElementById("add_num").value = count - 1;
}


window.onload = function() {
	let kind = document.getElementById('kind').value;
	if(kind == "location"){
	 document.getElementById(kind+'-tab').className = "nav-link active";
	 document.getElementById('sector-tab').className = "nav-link disabled";
	 document.getElementById('job-tab').className = "nav-link disabled";
	 document.getElementById('purpose-tab').className = "nav-link disabled";
	}
	else if(kind == "sector"){
	 document.getElementById(kind+'-tab').className = "nav-link active";
         document.getElementById('location-tab').className = "nav-link disabled";
         document.getElementById('job-tab').className = "nav-link disabled";
         document.getElementById('purpose-tab').className = "nav-link disabled";
        }
	else if(kind == "job"){
	 document.getElementById(kind+'-tab').className = "nav-link active";
         document.getElementById('location-tab').className = "nav-link disabled";
         document.getElementById('sector-tab').className = "nav-link disabled";
         document.getElementById('purpose-tab').className = "nav-link disabled";
        }
	else if(kind == "purpose"){
	 document.getElementById(kind+'-tab').className = "nav-link active";
         document.getElementById('location-tab').className = "nav-link disabled";
         document.getElementById('sector-tab').className = "nav-link disabled";
         document.getElementById('job-tab').className = "nav-link disabled";
        }
};




