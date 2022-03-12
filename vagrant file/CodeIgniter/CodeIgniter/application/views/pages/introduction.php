<html>
		<?php $img_url = $this->config->item('img_url');?>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet"
                href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
                
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/body.php">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/introduction.php">

		<title><?= $name ?> | Data Introduction</title>

	</head>
	<body>
		<div class="wholepage">

		<div class="pagecontents">
		<div class="main">
		<h2 style=
		"display: inline-block;
		padding: 0.5rem 1rem;
		border-top: 2px solid #000;
		border-bottom: 2px solid #000;
		">
		<strong><?= $name ?></strong></h2>
		<h6 class="text-primary"><strong><?= $point ?></strong></h6>
		<br>

			<div class="img">
			<?php
			if($sub_name != NULL){ ?>
			<img src="<?php echo $img_url.$sub_name; ?>"alt="" >
			<?php }else{?>
			<img src="<?php echo $img_url.'toppy.jpg'; ?>"alt="">
			<?php } ?>
			</div>

		<br>
		<h4><ruby>特徴<rt>とくちょう</rt></ruby></h4>
		<p class="feat"><?= $introduction ?></p>

		<br>

		<h4>キーワード</h4>
		<div class="tag" style="display:inline-flex">
			<?php
			for($i=0; $i<count($tag_name); $i=$i+1)
			{
			 $attributes = array('style' => 'height:30px; display:inline-block;');
			 echo form_open('loggedin/success',$attributes); ?>
				
				<div class="form-group">
				 <form name="tag_id<?php echo $i; ?>">
				 <input formaction="<?php echo site_url('loggedin/success'); ?>" 
				 type="hidden" name="tag_id[]"
				 value="<?php echo $tag_array[$i]; ?>">

				 <button type="submit" class="btn btn-link" 
				 style="text-decoration: none;" 
				 >#&nbsp;<?php echo $tag_name[$i]; ?></button>
				 </form>
				</div>
				
			<?php echo form_close(); ?>

			<?php } ?>
		</div>

		<?php $this->load->view('pages/introduce_detail/backpage'); ?>
		</div>	<!-- class = "main" -->
		</div>	<!-- class = "pagecontents" -->


		<div class="pagecontents">
		 <div class="timetable">
 		 <h4>どうぶつふれあいタイム</h4>
		 <p><?php echo $name; ?></p>
		 <p style="font-size:10pt; width:450px;">
		 <span>"予約する"を押すと予約ができます。</span>
		 <span>予約は取り消し可能です。</span>
		 <span>予約をしていなくてもふれあいタイムに参加できます。</span></p>

		 <div class="radio">
		 <input type="radio" name="selectedday" id="<?php echo $DateList[0];?>"
                 value="<?php echo $DateList[0];?>" onclick="tableChange();" checked>
                 <label for="<?php echo $DateList[0];?>">
                 <p style="margin:0px; letter-spacing:2px;">
                 <?php echo date("m/d",strtotime($DateList[0]));?></p>
                 </label>

		 <?php for($i=1;$i<count($DateList); $i=$i+1){ ?>
        	 <input type="radio" name="selectedday" id="<?php echo $DateList[$i];?>"
		 value="<?php echo $DateList[$i];?>" onclick="tableChange();">
         	 <label for="<?php echo $DateList[$i];?>">
		 <p style="margin:0px; letter-spacing:2px;">
		 <?php echo date("m/d",strtotime($DateList[$i]));?></p>
         	 </label>
		 <?php }?>
		 </div>


		 <div id="changeTable"> <!-- 日付でタイムテーブル切り替え -->
		 <?php
                 $this->load->view($changeTable,$timelist);
                 ?>
		 </div> <!-- changeTable -->


 		 </div> <!-- class = "timetable" -->
		</div> <!-- class = "pagecontents" -->

		</div> <!-- class="wholepage" -->

		<input type="hidden" name="animal_id"
		value="<?php echo $id; ?>">

<script src="<?php echo base_url()?>assets/js/introduction_js.php"></script>


