<html>
	<?php $img_url = $this->config->item('img_url'); ?>

	<head>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.php">
		<title>Login Page | chikuwa campany</title>

	</head>
	<body>
		<div class="main">
		<img src="<?php echo $img_url.'mydog.jpg'; ?>" alt="" 
		width="600px" height="auto" style="margin: 0 0 20px 0;">

		<h3>オンライン見本市「すみれ野メッセ 2020」</h3>
		<h3 class="text-primary">ログイン</h3>
		<br>

		<?php if(isset($login_false)){ ?>
		<p class="text-danger">
                <b>ログインID<small>または</small>パスワードが間違っています.</b></p>
		<?php } ?>

        	<?php $attributes = array("name" => "login");
        	echo form_open('user_login/login', $attributes);?>

		<form class="form-horizontal">

		<!-- id入力エリア -->
		<div class="form-group">
		<label for="user_id">ユーザーID</label>
		<input name="user_id" class="form-control" placeholder="&emsp;ユーザーIDを入力してください..."
		 type="text" style="width:100%;">
		<span class="text-danger"><?php echo form_error('user_id'); ?></span>
		</div>

		<!-- password入力エリア -->
		<div class="form-group">
		<label for="password">パスワード</label>
		<input name="password" class="form-control" 
		 placeholder="&emsp;パスワードを入力してください..."
		 type="text" style="width:100%;">
		<span class="text-danger"><?php echo form_error('password'); ?></span>
		</div>

		<br>
		<button name="submit" type="submit" style="width:90%;" class="btn btn-primary">ログイン</button>

		</form>
		<?php echo form_close(); ?>

		<a href="<?php echo site_url('user/register'); ?>">登録していない方はこちら</a>
		
		</div>

