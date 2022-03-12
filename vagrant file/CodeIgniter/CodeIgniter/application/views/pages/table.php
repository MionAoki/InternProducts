<html>
	<head>
    		<title>Resistered Table</title>
	</head>
	<body>
    		<h1>Resistered Table</h1>
    		<table border="1">
        	<tr>
            	<th>Id</th>
            	<th>Name</th>
		<th>Page</th>
        	</tr>
 
        	<?php foreach ($results as $row) { ?>
            
            	<tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
		<td><?php echo $row->page; ?></td>
            	</tr>
        	<?php } ?>
    		</table>
		<br>	
		<a href="<?php echo site_url('user/register'); ?>">Back to registration page</a>
	</body>
</html>
