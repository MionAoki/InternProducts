<html>
	<?php $img_url = $this->config->item('img_url'); ?>

	<head>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/register.php">
		<style>
		.form-group{ margin: 15px 100px;}
		</style>

		<title>新規登録 | chikuwa campany</title>
	</head>
	
	<body>
		<div class="main">
		<img src="<?php echo $img_url.'mydog.jpg'; ?>" alt="" 
		width="600px" height="auto" style="margin: 0 0 20px 0;">
		<h3>オンライン見本市「すみれ野メッセ 2020」</h3>
		<h3 class="text-primary">新規登録</h3>
		<br>

		<a href="<?php echo site_url('user_login/login'); ?>"
		style="font-size:10pt;">
		すでに登録している方はこちら</a>

        	<?php $attributes = array("name" => "registration");
        	echo form_open('user/register', $attributes);?>

		<div class="form-row" style="margin:15px 100px;">
			<div class="col-sm-6">
                	<label for = "lastname">姓</label></td>
                	<input name="lastname" placeholder="姓を入力してください"
                	type="text" style="width:100%;" class="form-control">
                	<span class="text-danger"><?php echo form_error('lastname'); ?></span>
                	</div>
			
			<div class="col-sm-6">
                	<label for = "firstname">名</label></td>
                	<input name="firstname" placeholder="名を入力してください"
                	type="text" style="width:100%;" class="form-control">
                	<span class="text-danger"><?php echo form_error('firstname'); ?></span>
                	</div>
		</div>

		<div class="form-group">			
		<label for = "user_id">ユーザーID (メールアドレス)</label></td>
                <input name="user_id" placeholder="ユーザーIDを入力してください" 
		type="text" style="width:100%;" class="form-control">
		<span class="text-danger"><?php echo form_error('user_id'); ?></span>
		</div>

		<div class="form-group">
               	<label for = "password">パスワード</label>
		<input name="password" placeholder="パスワードを入力してください" 
		type="text" style="width:100%;" class="form-control">
		<span class="text-danger"><?php echo form_error('password'); ?></span>
		</div>

		<div class="form-group">
                <label for = "passconf">パスワード確認用</label>
                <input name="passconf" placeholder="パスワードを再入力してください"
                type="text" style="width:100%;" class="form-control">
                <span class="text-danger"><?php echo form_error('passconf'); ?></span>
                </div>

		<br>
		<button name="submit" type="submit" class="btn btn-primary" style="width:90%;">
		登録する</button> 
		
		<?php echo form_close(); ?>

		</div>



