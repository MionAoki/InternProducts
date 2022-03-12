<html>
 <head>
 	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/admin_login.php">
	<title>Admin Login Page | chikuwa campany</title>

 </head>
 <body>
	<div class="main">
	 <h3>オンライン見本市「すみれ野メッセ 2020」</h3>
	 <h3 class="text-secondary">管理者ログイン</h3>
	 <br>

	<?php if(isset($_SESSION['login_false'])){ ?>
                <p class="text-danger">
		<?php echo $_SESSION['login_false'];?>
		<p>
	<?php } ?>

	 <?php $attributes = array("name" => "admin_login"); 
	 echo form_open('admin_login/login', $attributes);?>
	
	 <!-- id入力エリア -->
	 <div class="form-group">
                <label for="admin_id">管理者ID</label>
                <input name="admin_id" class="form-control" 
		placeholder="&emsp;管理者IDを入力してください..." type="text" style="width:100%;">
                <span class="text-danger"><?php echo form_error('admin_id'); ?></span>
	 </div>

	 <!-- password入力エリア -->
         <div class="form-group">
                <label for="password">パスワード</label>
                <input name="password" class="form-control" 
		placeholder="&emsp;パスワードを入力してください..." type="text" style="width:100%;">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
         </div>

	 <br>
	 <button name="submit" type="submit" style="width:90%;" class="btn btn-secondary">ログイン</button>
	 <?php echo form_close(); ?>
	 </div>

	<div class="notice">
	 <p>&#8251;ここは管理者用ログインページです</p>
	 <p>&#8251;管理者ID,パスワードをお持ちで無い方はご利用頂けません</p>
	</div>

 </body>

</html>


