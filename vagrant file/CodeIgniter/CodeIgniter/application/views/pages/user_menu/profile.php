<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet"href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/profile.php">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/profile_info.php">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/logoutWindow.php">

	<title>My profile | chikuwa campany</title>

</head>
<body>
	<div class="wholepage">
	<?php $this->load->view('pages/user_menu/user_menu',$user_name);?>

	<div class="main">
		<?php if(isset($_SESSION['msg_success'])){ ?>
		 <h5 class="text-success"><strong>プロフィール情報を変更しました</strong></h5>
		<?php } ?>
		
		<h4 class="text-primary"><b>プロフィール情報</b></h4>
		<div class="profile">
		<h5 class="text-primary"><b>ユーザー名</b></h5>
		<p style="padding:5px 5px 5px 1em;">
		<?php echo $user_name; ?></p>
		</div>

		<div class="profile">
		<h5 class="text-primary"><b>ユーザーID</b></h5>
		<p style="padding:5px 5px 5px 1em;">
		<?php echo $user_id; ?></p>
		</div>

		<div class="profile">
                <h5 class="text-primary"><b>電話番号</b></h5>
                <p style="padding:5px 5px 5px 1em;">
                <?php echo $tel; ?></p>
                </div>

		<div class="profile">
                <h5 class="text-primary"><b>自己紹介メッセージ</b></h5>
                <p style="padding:5px 5px 5px 1em;">
		<?php if($message == NULL){ ?>
		<span class ="noset">未設定</span></p>
		<?php }else{
                echo $message; ?></p>
		<?php } ?>
                </div>

		<div class="profile">
                <h5 class="text-primary"><b>所在地</b></h5>
                <p style="padding:5px 5px 5px 1em;">
		<?php if($userLoc == NULL){ ?>
		<span class ="noset">未設定</span></p>
		<?php }else{
                echo $userLoc; ?></p>
                <?php } ?>
		</div>

		<div class="profile">
                <h5 class="text-primary"><b>業種</b></h5>
                <p style="padding:5px 5px 5px 1em;">
                <?php if($userSector == NULL){ ?>
                <span class ="noset">未設定</span></p>
                <?php }else{
                echo $userSector; ?></p>
                <?php } ?>
                </div>

		<div class="profile">
                <h5 class="text-primary"><b>職種</b></h5>
                <p style="padding:5px 5px 5px 1em;">
                <?php if($userJob == NULL){ ?>
                <span class ="noset">未設定</span></p>
                <?php }else{
                echo $userJob; ?></p>
                <?php } ?>
                </div>

		<div class="profile">
                <h5 class="text-primary"><b>参加目的</b></h5>
                <?php if($userPurpose == NULL){ ?>
                <p style="padding:5px 5px 5px 1em;">
		<span class ="noset">未設定</span></p>
                <?php }else{ ?>
                 <div style="border: solid 1px #808080; padding:20px 5px;">
		 <?php for($i=0; $i<count($userPurpose); $i=$i+1){ ?>
		 <p class="text-primary" style="padding:5px 5px 5px 1em; margin:0;
		 display:inline;">
		 # <?php echo $userPurpose[$i]; ?></p>
		 <?php } ?>
		
                 <?php if($other != NULL){ ?>
		 <p style="margin:0; padding:5px 5px 5px 1em;">
		 その他の内容: <?php echo $other; ?></p>
                 <?php } ?>
		 </div>
                <?php } ?>
                </div>

		<div class="profile">
                <h5 class="text-primary"><b>好きな分類</b></h5>
                <?php if($userFavtag == NULL){ ?>
                <p style="padding:5px 5px 5px 1em;">
                <span class ="noset">未設定</span></p>
                <?php }else{ ?>
		 <div style="border: solid 1px #808080; padding:20px 5px;">
                 <?php for($i=0; $i<count($userFavtag); $i=$i+1){ ?>
                 <p class="text-primary" style="padding:5px 5px 5px 1em; margin:0;
		 display:inline;">
		 # <?php echo $userFavtag[$i]; ?></p>
                 <?php } ?>
		 </div>
                <?php } ?>
                </div>

		<br>
		<a class="btn btn-outline-primary" role="button"
                style="width:20%;"
                href="<?php echo site_url('loggedin/success'); ?>">
                <ruby>一覧<rt>いちらん</rt></ruby>に<ruby>戻<rt>もど</rt></ruby>る</a>

		<a class="btn btn-outline-primary" role="button"
                style="width:40%; margin:0px 10px;" 
		href="<?php echo site_url('user_profile/edit_prof'); ?>">
                <ruby>編集<rt>へんしゅう</rt></ruby>する</a>

        </div>
	</div>

