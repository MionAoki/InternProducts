<html>
 <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/profdata_edit.php">

        <title>Admin ProfileDataEdit Page | chikuwa campany</title>
 </head>
 <body>
        <div class="main">
        <h3>オンライン見本市「すみれ野メッセ 2020」</h3>
        <h3 class="text-secondary">プロフィール用データ編集</h3>
        <br>

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
	<?php $attributes = array("class" => "add_data");
        echo form_open('admin_profdata/edit', $attributes);?>

	<input type="hidden" id="kind" name="select_table" value="<?php echo $kind;?>">  <!--編集テーブル判別用-->

<?php if($kind == "location"){ ?>
	<?php $this->load->view('pages/admin/profdata_tab/edit_location');?>
<?php }else if($kind == "sector"){ ?>
	<?php $this->load->view('pages/admin/profdata_tab/edit_sector');?>
<?php }else if($kind == "job"){ ?>
        <?php $this->load->view('pages/admin/profdata_tab/edit_job');?>
<?php }else if($kind == "purpose"){ ?>
        <?php $this->load->view('pages/admin/profdata_tab/edit_purpose');?>
<?php }?>

	<?php echo form_close(); ?>
	</div> <!--tab-content-->

	</div> <!--main-->

 </body>
</html>

<script src="<?php echo base_url()?>assets/js/admin/profdata_edit_js.php"></script>
