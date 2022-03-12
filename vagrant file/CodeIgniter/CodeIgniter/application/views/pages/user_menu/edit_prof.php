<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet"
	href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/profile.php">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/profile_edit.php">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/logoutWindow.php">

        <title>Edit my profile | chikuwa campany</title>

</head>
<body>
	<div class="wholepage">
	<?php $this->load->view('pages/user_menu/user_menu',$user_name);?>
	
	<div class="main">
		<h4 class="text-primary"><b>プロフィール編集</b></h4>
		<br>

		<?php $attributes = array("name" => "editprof");
                echo form_open('user_profile/change_prof', $attributes);?>

		<div class="profile">
                <div class="form-row" style="margin:15px 100px;">
                        <div class="col-sm-6">
                        <label for = "lastname">姓&emsp;
			<span class="text-danger" style="font-size:10pt;">&#8251;必須</span>
			</label></td>
                        <input name="lastname" value="<?php echo $Name[0]; ?>"
                        type="text" style="width:100%;" class="form-control">
			<?php if(isset($_SESSION['valid_error']["lastname"])){ ?>
                        	<p class="text-danger" style="text-align:center; margin:0;">
				<?php echo $_SESSION['valid_error']["lastname"]; ?></p>
			<?php } ?>
                        </div>

                        <div class="col-sm-6">
                        <label for = "firstname">名&emsp;
			<span class="text-danger" style="font-size:10pt;">&#8251;必須</span>
			</label></td>
                        <input name="firstname" value="<?php echo $Name[1]; ?>"
                        type="text" style="width:100%;" class="form-control">
			<?php if(isset($_SESSION['valid_error']["firstname"])){ ?>
                        	<p class="text-danger" style="text-align:center; margin:0;">
                        	<?php echo $_SESSION['valid_error']["firstname"]; ?></p>
                        <?php } ?>
                        </div>
                </div>
		</div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <label for = "user_id">ユーザーID&emsp;
		<span class="text-danger" style="font-size:10pt;">&#8251;必須</span></label></td>
                <input name="user_id" value="<?php echo $user_id; ?>"
                type="text" style="width:100%;" class="form-control">
                <?php if(isset($_SESSION['valid_error']["id"])){ ?>
                        <p class="text-danger" style="text-align:center; margin:0;">
                        <?php echo $_SESSION['valid_error']["id"]; ?></p>
		<?php } ?>
		</div>
		</div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <label for = "tel">電話番号</label>
		<?php if(isset($tel)){ ?>
		 <input name="tel" value="<?php echo $tel; ?>"
                 type="text" style="width:100%;" class="form-control">
		<?php }else{ ?>
                 <input name="tel" placeholder="&emsp;(例)080-1234-5678"
                 type="text" style="width:100%;" class="form-control">
		<?php } ?>
                </div>
                </div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <label for = "message">自己紹介メッセージ</label>
                <?php if(isset($message)){ ?>
		 <textarea name="message" type="text" style="width:100%;" class="form-control"><?php echo $message; ?></textarea>
                <?php }else{ ?>
		 <textarea name="message" placeholder="&emsp;メッセージを入力"
                 type="text" style="width:100%;" class="form-control"></textarea>
                <?php } ?>
		</div>
                </div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <label for = "location">所在地&emsp;
		<span class="text-danger" style="font-size:10pt;">&#8251;必須</span></label>
		<select name="location" class="form-control">
		<option>選択してください</option>
		<?php foreach($location as $row){
			$loc = $row->list;
			$loc_id = $row->id;
			if(isset($userLoc_id) and ($userLoc_id == $loc_id)){ ?>
				<option value="<?php echo $loc_id; ?>" selected><?php echo $loc; ?></option>
			<?php }else{ ?>
				<option value="<?php echo $loc_id; ?>"><?php echo $loc; ?></option>
			<?php } ?>
		<?php } ?>
		</select>
		<?php if(isset($_SESSION['valid_error']["location"])){ ?>
                        <p class="text-danger" style="text-align:center; margin:0;">
                        所在地を<?php echo $_SESSION['valid_error']["location"]; ?></p>
                <?php } ?>
                </div>
                </div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <label for = "sector">業種</label>
                <select name="sector" class="form-control">
                <option>選択してください</option>
                <?php foreach($sector as $row){
                        $sector = $row->list;
			$sector_id = $row->id;
			if(isset($userSector_id) and ($userSector_id == $sector_id)){ ?>
                                <option value="<?php echo $sector_id; ?>" selected><?php echo $sector; ?></option>
                        <?php }else{ ?>
                        	<option value="<?php echo $sector_id; ?>"><?php echo $sector; ?></option>
                	<?php } ?>
		<?php } ?>
                </select>
                </div>
                </div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <label for = "job">職種</label>
                <select name="job" class="form-control">
                <option>選択してください</option>
                <?php foreach($job as $row){
                        $job = $row->list;
			$job_id = $row ->id;
			if(isset($userJob_id) and ($userJob_id == $job_id)){ ?>
                                <option value="<?php echo $job_id; ?>" selected><?php echo $job; ?></option>
                        <?php }else{ ?>
                        	<option value="<?php echo $job_id; ?>"><?php echo $job; ?></option>
                	<?php } ?>
		<?php } ?>
                </select>
                </div>
                </div> <!-- profile -->
		
		<div class="profile">
                <div class="form-group">
		<div class="checkbox" data-toggle="buttons">
		<p>参加目的</p>
                <?php foreach($purpose as $row){
                        $purpose = $row->list;
                        $purpose_id = $row->id; ?>
			
			<label class="btn btn-outline-secondary" 
			aria-pressed="false">

			<?php if(in_array($purpose_id,$userPurpose_id)){ ?>
			<input type="checkbox" name="purpose[]" id="purpose<?php echo $purpose_id; ?>"
                        autocomplete="off" value="<?php echo $purpose_id ?>" checked>
                        <?php echo $purpose;?></label>
			<?php }else{ ?>
    			<input type="checkbox" name="purpose[]" id="purpose<?php echo $purpose_id; ?>" 
			autocomplete="off" value="<?php echo $purpose_id ?>">
			<?php echo $purpose;?></label>
			<?php } ?>
                <?php } ?>
			<div id="other" style="display:none;">
			 <p style="margin:0;">その他を選んだ方は下記欄に内容をご回答ください</p>
			 <?php if(isset($other)){ ?>
                 	 <textarea name="other" type="text" style="width:100%;" class="form-control"><?php echo $other; ?></textarea>
                	 <?php }else{ ?>
                 	 <textarea name="other" placeholder="&emsp;参加目的を入力"
                 	 type="text" style="width:100%;" class="form-control"></textarea>
                	 <?php } ?>
			</div>
		</div>
                </div>
                </div> <!-- profile -->

		<div class="profile">
                <div class="form-group">
                <div class="checkbox" data-toggle="buttons">
                <p>好きな分類</p>
                <?php foreach($favtag as $row){
                        $tag = $row->tag_name;
                        $tag_id = $row->id; ?>

                        <label class="btn btn-outline-secondary"
                        aria-pressed="false">

                        <?php if(in_array($tag_id,$userFavtag_id)){ ?>
                        <input type="checkbox" name="favtag[]"
                        autocomplete="off" value="<?php echo $tag_id ?>" checked>
                        <?php echo $tag; ?></label>
                        <?php }else{ ?>
                        <input type="checkbox" name="favtag[]"
                        autocomplete="off" value="<?php echo $tag_id ?>">
                        <?php echo $tag; ?></label>
                        <?php } ?>
                <?php } ?>
                </div>
                </div>
                </div> <!-- profile -->

		<br>
		<a class="btn btn-outline-primary" role="button"
                style="width:40%;"
                href="<?php echo site_url('user_profile/profile'); ?>">
                キャンセル</a>

		<button name="submit" type="submit" class="btn btn-outline-primary" 
		style="width:50%;">決定する</button>
		
		<?php echo form_close(); ?>

	</div> <!-- main -->
	</div> <!-- wholepage -->

<script src="<?php echo base_url()?>assets/js/edit_prof_js.php"></script>

