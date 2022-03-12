<html>
 <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/admin_timetable.php">

        <title>Admin TimetableEdit Page | chikuwa campany</title>
 </head>
 <body>
	<div class="main">
        <h3>オンライン見本市「すみれ野メッセ 2020」</h3>
        <h3 class="text-secondary">タイムテーブル編集</h3>
        <br>

	<div class ="result_msg">
	 <?php if(isset($msg)){ ?>
		<p><?php echo $msg;?></p>
	 <?php } ?>
	</div>

	<div class="select_date" name="radio">

	<div class="btn-group btn-group-toggle" data-toggle="buttons">
	 <?php for($i=0;$i<count($Date);$i=$i+1){ ?>
		<label class="btn btn-outline-dark btn-lg active">
	 	<?php if($i==0){?>
	 	<input type="radio" name="selected" onclick="change()" autocomplete="off" 
		value="<?php echo $Date[$i];?>" checked><?php echo $Date[$i];?>
	 	<?php }else{ ?>
	 	<input type="radio" name="selected" onclick="change()" autocomplete="off"
		value="<?php echo $Date[$i];?>"><?php echo $Date[$i];?>
	 	<?php }?>
  	 	</label>
	 <?php } ?>
	</div>

	<button type="submit" class="btn btn-dark" name="content" id="add_btn"
 onclick="location.href='<?php echo site_url('admin_timetable/edit'); ?>'" value="add">日付,時刻を追加する</button>

	</div> <!--select_date-->

         <div id="timetable">
	 <?php
                $this->load->view($timetable,$DateList);
         ?>
	 </div>

	
	<a id="backmain" class="btn btn-secondary" href="<?php echo site_url('admin_main/main'); ?>" role="button">メニューに戻る</a>
        </div> <!--main-->
 </body>
</html>
<script src="<?php echo base_url()?>assets/js/admin/admin_timetable_js.php"></script>

