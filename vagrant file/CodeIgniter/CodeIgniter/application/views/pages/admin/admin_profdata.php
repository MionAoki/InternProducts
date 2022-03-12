<html>
 <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/admin_profdata.php">

        <title>Admin ProfileDataEdit Page | chikuwa campany</title>
 </head>
 <body>
	<div class="main">
	<h3>オンライン見本市「すみれ野メッセ 2020」</h3>
        <h3 class="text-secondary">プロフィール用データ編集</h3>
        <br>

	<div class ="result_msg">
         <?php if(isset($msg)){ ?>
                <p><?php echo $msg;?></p>
         <?php } ?>
        </div>
	
	<ul class="nav nav-tabs justify-content-center nav-fill">
	<li class="nav-item">
	<a class="nav-link active" id="location-tab" data-toggle="tab" href="#location" 
	role="tab" aria-controls="location" aria-selected="true">所在地</a>
	</li>

  	<li class="nav-item">
    	<a class="nav-link" id="sector-tab" data-toggle="tab" href="#sector" 
	role="tab" aria-controls="sector" aria-selected="false">業種</a>
	</li>

	<li class="nav-item">
	<a class="nav-link" id="job-tab" data-toggle="tab" href="#job" 
	role="tab" aria-controls="job" aria-selected="false">職種</a>
	</li>
	
	<li class="nav-item">
        <a class="nav-link" id="purpose-tab" data-toggle="tab" href="#purpose"
        role="tab" aria-controls="purpose" aria-selected="false">参加目的</a>
        </li>
	</ul>

	<div class="tab-content">

	<!--モーダルウィンドウ-->
<div id="modalDelete" class="modalNoDisp">
<div class="delWindow">
	<p id="delname"><p>
        <p>を削除しますか？</p>
        <?php $attributes = array("class" => "del_data");
        echo form_open('admin_profdata/deldata', $attributes);?>
        <input type="hidden" id="delid" name="delid" value="">

        <div style="display:inline-block">
        <input type="button" value="Cancel" class="btn btn-secondary"
        style="width:80px;" onclick="delClose()">

        <button type="submit" class="btn btn-primary" id="del_btn"
        onclick="delClose()" style="width:80px;">OK</button>

        </div>
        <?php echo form_close(); ?>
</div>
</div> <!--modalNoDisp-->

	<?php $this->load->view('pages/admin/profdata_tab/profdata_location'); ?>
	<?php $this->load->view('pages/admin/profdata_tab/profdata_sector'); ?>
	<?php $this->load->view('pages/admin/profdata_tab/profdata_job'); ?>
	<?php $this->load->view('pages/admin/profdata_tab/profdata_purpose'); ?>

	</div> <!--tab-content-->


	<a id="backmain" class="btn btn-secondary" href="<?php echo site_url('admin_main/main'); ?>" role="button">メニューに戻る</a>
	</div> <!--main-->
 </body>
</html>

<script src="<?php echo base_url()?>assets/js/admin/admin_profdata_js.php"></script>

