<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/admin_pass.php">
	<title>Prohibited except by admin | chikuwa campany</title>
</head>
<body>
 <div class="main">
	<p class="text-danger">Prohibited except by admin</p>

	<?php $attributes = array("name" => "encry_adminpass");
        echo form_open('admin_login/encryption', $attributes);?>


	<label for="encry_pass">password</label>
	<div class="form-row">
	<div class="form-group">
	 <?php if(isset($_SESSION['input_pass'])){ ?>
	 	<input name="encry_pass" class="form-control"
         	value="<?php echo $_SESSION['input_pass'];?>" type="text">
	 <?php }else{ ?>
	 	<input name="encry_pass" class="form-control"
	 	placeholder="&emsp;Enter Password" type="text">
	 <?php }?>
	</div>
	
	<div class="col-auto">
	<button name="submit" type="submit" class="btn btn-secondary">encrypt</button>
	</div>
	</div>
	<?php echo form_close(); ?>
	
	<?php if(isset($encry_pass)){ ?>
	<div class="show">
	 <textarea readonly name="encry_pass" id="encry_pass"
	 class="form-control"><?php echo $encry_pass; ?></textarea></p>
	 <button onclick="textcopy()" class="btn btn-dark btn-sm">copy</button>

	</div>
	<?php } ?>


<p style="margin:5px 0px;">Copy the encrypted password and enter it directly into the database.</p>
 </div>
</body>
</html>

<script src="<?php echo base_url()?>assets/js/admin/admin_pass_js.php"></script>
