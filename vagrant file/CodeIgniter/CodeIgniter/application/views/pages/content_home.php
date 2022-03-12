
<div id="content">
    <?php
        foreach($results as $row){
            $id = $row->id;
            $name = $row->name;
            echo 'id = ', $id;
	    echo "<br>";
	    echo 'name = ', $name;
	    echo "<br>";
	}
	//$this->load->helper('html');
        //echo heading('Welcome!', 4, "class=home-h1")
    ?>
</div>
