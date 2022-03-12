<html>
 <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/timetable_edit.php">

        <title>Admin TimetableEdit Page | chikuwa campany</title>
 </head>
 <body>
        <div class="main">
        <h3>オンライン見本市「すみれ野メッセ 2020」</h3>
        <h3 class="text-secondary">タイムテーブル編集</h3>
        <br>

	<?php $attributes = array("class" => "add_data");
	echo form_open('admin_timetable/edit', $attributes);?>

	<div class="date">
	 <label for="date">日付</label>
<?php if(isset($formar["date"])){ ?>
	 <input type="date" name="date" class="form-control" value="<?php echo $formar["date"];?>">
<?php }else{ ?>
	 <input type="date" name="date" class="form-control"
	 value="<?php echo set_value('date'); ?>">
<?php }?>
	 <span class="text-danger"><?php echo form_error('date'); ?></span>

	 <?php if(isset($_SESSION['table_unique'])){ ?>
	  <span class="text-danger"><?php echo $_SESSION['table_unique'];?></span>
	 <?php }?>
	</div>

	<div class="list">
	<table id="TTedit">
        <tr>
	<th></th>
        <th>開始時間</th>
        <th>終了時間</th>
        <th>予約状況</th>
        </tr>

	<tr>
	<td></td>
	<td>
<?php if(isset($formar["sTime"])){ ?>
	<input type="time" name="sTime0" class="form-control" value="<?php echo $formar["sTime"];?>">
<?php }else{?>
	<input type="time" name="sTime0" class="form-control"
	value="<?php echo set_value('sTime0'); ?>">
<?php }?>
	<span class="text-danger"><?php echo form_error('sTime0'); ?></span></td>

	<td>
<?php if(isset($formar["eTime"])){ ?>
        <input type="time" name="eTime0" class="form-control" value="<?php echo $formar["eTime"];?>">
<?php }else{?>
	<input type="time" name="eTime0" class="form-control"
	value="<?php echo set_value('eTime0'); ?>">
<?php }?>	
	<span class="text-danger"><?php echo form_error('eTime0'); ?></span></td>

	<td>
<?php if(isset($formar["filled_animal"])){ ?>
        <input type="text" name="filled_animal0" class="form-control" 
	value="<?php echo $formar["filled_animal"];?>">
<?php }else{?>
	<input type="text" name="filled_animal0" class="form-control"
	placeholder="&emsp;(例)&emsp;イヌ,チワワ"
	value="<?php echo set_value('filled_animal0'); ?>">
<?php }?>
	<?php if(isset($_SESSION['animal_errmsg'][0])){ ?>
	<span class="text-danger"><?php echo $_SESSION['animal_errmsg'][0];?></span>
	<?php }?></td>
	</tr>

<?php for($j=1;$j<$add_num+1;$j=$j+1){ ?>
	<tr>
        <td>
	 <button type="button" class="btn btn-dark" id="<?php echo $j;?>"
	 onclick = function(){deleteBtn(this);}>削除</button>
	</td>
        <td><input type="time" name="sTime<?php echo $j; ?>" class="form-control"
	value="<?php echo set_value('sTime'.$j); ?>">
        <span class="text-danger"><?php echo form_error('sTime'.$j); ?></span></td>

        <td><input type="time" name="eTime<?php echo $j; ?>" class="form-control"
	value="<?php echo set_value('eTime'.$j); ?>">
        <span class="text-danger"><?php echo form_error('eTime'.$j); ?></span></td>

        <td><input type="text" name="filled_animal<?php echo $j; ?>" class="form-control"
        placeholder="&emsp;(例)&emsp;イヌ,チワワ"
	value="<?php echo set_value('filled_animal'.$j); ?>">
	<?php if(isset($_SESSION['animal_errmsg'][$j])){ ?>
        <span class="text-danger"><?php echo $_SESSION['animal_errmsg'][$j];?></span>
        <?php }?>
	</td>
        </tr>
<?php } ?>

	</table>
	</div> <!-- list -->
	
	<input type="hidden" id="add_num" name="add_num" value="<?php echo $add_num;?>">

<?php if(! isset($formar)){ ?>
	<button type="button" class="btn btn-dark"
        id="add_form">追加</button>
<?php }?>

	<br>
	<a id="cancel" class="btn btn-secondary"
	href="<?php echo site_url('admin_timetable/editmenu'); ?>" role="button">キャンセル</a>

	<button type="submit" class="btn btn-dark" name="posted"
        id="edit_btn" value="posted">編集する</button>

	<?php echo form_close(); ?>
 </body>
</html>

<script src="<?php echo base_url()?>assets/js/admin/timetable_edit_js.php"></script>
