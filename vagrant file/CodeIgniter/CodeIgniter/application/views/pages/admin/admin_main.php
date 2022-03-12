<html>
 <head>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/admin_main.php">

	<title>Admin Main Page | chikuwa campany</title>
 </head>
 <body>
	<div class="logout">
	<a class="btn btn-secondary" href="<?php echo site_url('admin_main/logout'); ?>" role="button">
	ログアウト</a>
	</div>

	<div class="main">
	<h3>オンライン見本市「すみれ野メッセ 2020」</h3>
	<h3 class="text-secondary">管理者メニュー</h3>

	<div class = "menu">
	<a href="<?php echo site_url('admin_animal/editmenu'); ?>">動物データ編集</a>
	<a href="<?php echo site_url('admin_timetable/editmenu'); ?>">タイムテーブル編集</a>
	<a href="<?php echo site_url('admin_profdata/editmenu'); ?>">プロフィール用データ編集</a>
	</div>

	</div>

 </body>
</html>
