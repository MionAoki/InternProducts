<html>
	<?php $img_url = $this->config->item('img_url'); ?>
	<head>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
                <link rel="stylesheet" href="<?php echo base_url()?>assets/css/register.php">
		<title>登録完了 | chikuwa campany</title>
	</head>

	<body>
		<div class="main">
                <img src="<?php echo base_url('assets/img/mydog.jpg'); ?>" alt="犬"
                width="600px" height="auto" style="margin: 0 0 20px 0;">
                <h3>オンライン見本市「すみれ野メッセ 2020」</h3>
		<h3 class="text-success">登録が完了しました！</h3>
		<br>
		<p><b>ご登録いただきありがとうございます。</b><br>
		ご登録メールアドレスにご確認のメールをお送りしました。<br>
		メールが届かない場合は
		<span class="text-info">お問い合わせ</span>
		からご連絡ください。</p>

		<a class="btn btn-primary btn-lg" role="button" 
		style="margin:20px auto auto auto;" href="<?php echo site_url('user_login/login'); ?>">
		ログインページに移動する</a>

		</div>
