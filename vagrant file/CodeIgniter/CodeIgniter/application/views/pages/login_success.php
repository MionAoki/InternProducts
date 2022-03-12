<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" 
		href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
		<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/login_success.php">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/logoutWindow.php">

		<title>Database List | chikuwa campany</title>
		
	</head>
	<body>
		<div class="wholepage">
		<div class="main">
		<h3>オンライン見本市「すみれ野メッセ2020」</h3>
		<br>

		<form>
		<div class="form-row">
			<div class="col-auto">
                	<input type="button" value="タグ検索" onclick="modalOpen()"
			class="btn btn-info mb-2">
			</div>

			<?php $attributes = array("class" => "input-keyword");
                	echo form_open('loggedin/search', $attributes);?>
                
			<div class="col-sm-7">	
			<input name="keyword" id="keyword" type="text" 
			class="form-control" placeholder="&emsp;フリーワード検索"
                 	>
			</div>
			
			<div class="col-auto">
			<button type="submit" id="search" 
			class="btn btn-primary mb-2">search</button>
			</div>
		</div>
		
		<div class="radio_button">
			<input type="radio" name="how_search" value="or_search" checked>OR検索
			<input type="radio" name="how_search" value="and_search">AND検索
		</form>
		</div>
		
			<?php echo form_close(); ?>

		<br>
		<h4>どうぶつ<ruby>一覧<rt>いちらん</rt></ruby></h4>

		<div id="main_content">
		<?php
		 $this->load->view($main_content,$results);
		?>
		</div>

		</div> <!--main-->
		
		<div class="subpage">
		<div class="fixed_buttun">
			<?php $this->load->view('pages/user_menu/user_menu',$user_name);?>
                </div> <!--fixed_button-->
		</div> <!--subpage-->

		</div> <!--wholepage-->		
		<br>

		<!--モーダルウィンドウ-->
		<div id="modalArea" class="modalNoDisp">
                                <div class="modalWindow">
				<p style="text-align: right">
				<input type="button" value="閉じる" class="btn btn-info"
				 style="width:80px" onclick="modalClose()"></p>
				
                                <?php echo form_open('loggedin/success'); ?>

				<form name="checkboxes">
                                <?php
                                for($i=0; $i<count($tag); $i=$i+1)
				{ ?>
				<input type="checkbox" name="tag_search[]"
                                formaction="<?php echo site_url('loggedin/success'); ?>"
                                value="<?php echo $i+1 ?>" id="id<?php echo $i+1 ?>">
                                
                                <label for="id<?php echo $i+1 ?>" class="label">
                                <?php echo $tag[$i] ?></label>

                                <?php }?>
				</form>

				<div style="display: inline; text-align: right;">
				<p><input type="button" value="全て選択" onclick="allcheck(true)"
				class="btn btn-info btn-sm">
				<input type="button" value="全て解除" onclick="allcheck(false)"
				class="btn btn-info btn-sm"></p>
				</div>

                                <p style="text-align: center"><input type="submit"
                                value="検索" id="tag_search" style="font-size:15pt;width:100px"
                                class="btn btn-info" onclick="modalClose()"></p>
                                </div>
                </div>

		<?php if(isset($selected_tagid)){ ?>
                        <input type="hidden" name="selected_tag"
                        value="<?php echo $selected_tagid; ?>">
                <?php } ?>

		<script src="<?php echo base_url()?>assets/js/login_success_js.php"></script>

