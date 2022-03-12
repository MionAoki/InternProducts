<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/admin/admin_animal.php">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

	<title>Admin AnimalDataEdit Page | chikuwa campany</title>
</head>
<body>

 <div class="main">
 	<h3>オンライン見本市「すみれ野メッセ 2020」</h3>
	<h3 class="text-secondary">動物データ編集</h3>
	<br>

 <div class="editform">
 <?php $attributes = array("class" => "add_data");
 echo form_open_multipart('admin_animal/edit', $attributes);?>

 <div class="form-group">
	<label for="name">動物名</label>
	<span class="text-danger"><?php echo form_error('name'); ?></span>

	<?php if(isset($formar["name"])){ ?>
	 <input type="text" id="name" name="name" class="form-control"
	 value = "<?php echo $formar["name"]; ?>">
	<?php }else{ ?>
	 <input type="text" id="name" name="name" class="form-control"
	 value="<?php echo set_value('name');?>">
	<?php } ?>
 </div>

 <div class="form-group">
    	<label for="point">分類
	<p class="small">&#8251;漢字以外はカタカナで入力してください</p></label>
	<span class="text-danger"><?php echo form_error('point'); ?></span>      	

	<?php if(isset($formar["point"])){ ?>
         <input type="text" id="point" name="point" class="form-control"
         value = "<?php echo $formar["point"]; ?>">
        <?php }else{ ?>
         <input type="text" id="point" name="point" class="form-control"
	 value="<?php echo set_value('point');?>">
        <?php } ?>

 </div>

 <div class="form-group">
    	<label for="introduction">特徴
	<p class="small">&#8251;最大画像サイズ:1024&#215;768 画像形式:jpg,jpeg,png</p></label>
	<span class="text-danger"><?php echo form_error('introduction'); ?></span>

	<?php if(isset($formar["introduction"])){ ?>
         <textarea id="introduction" name="introduction" 
	 class="form-control"><?php echo $formar["introduction"]; ?></textarea>
        <?php }else{ ?>
	 <textarea id="introduction" name="introduction" 
	 class="form-control"><?php echo set_value('introduction');?></textarea>
        <?php } ?>

 </div>

 <div class="form-group">
        <label for="picture">画像</label>

	<input type="file" id="picture" name="picture" style="display:none;">
        <?php if(isset($formar["sub_name"])){ ?>
		<input readonly type="text" id="photoCover" name="sub_name"
		class="form-control" value="<?php echo $formar["sub_name"];?>">
        <?php }else{ ?>
                <input readonly type="text" id="photoCover" name="sub_name"
		class="form-control" placeholder="select file..."> 
        <?php } ?>

	<button type="button" class="btn btn-secondary"
	onclick="$('input[id=picture]').click();"><i class="fas fa-images"></i>ファイルを選択する</button>
	<button type="button" class="btn btn-secondary" onclick="no_choose();">
	<i class="fas fa-times"></i>選択しない</button>

 </div>

 <div class="checkboxes">
	<label for="tagselect">所持タグ</label>
	<?php if(isset($chkbox_err)){ ?>
	<p class="text-danger"><?php echo $chkbox_err;?></p>
	<?php }?>

 	<div id="tagselect">
	<?php for($i=0; $i<count($taglist); $i=$i+1){
	 if(isset($formar["chk_box"]) &&
         in_array($i+1, $formar["chk_box"]) == TRUE){ ?>
	
	  <input type="checkbox" name="tag[]"
          value="<?php echo $i+1 ?>" id="id<?php echo $i+1 ?>" checked="checked">

	 <?php }else{ ?>
	  <input type="checkbox" name="tag[]"
	  value="<?php echo $i+1; ?>" id="id<?php echo $i+1 ?>"
	  <?php echo set_checkbox('tag[]',$i+1,FALSE);?>>
	 <?php } ?>

	 <label for="id<?php echo $i+1 ?>" class="label">
	 <?php echo $taglist[$i] ?></label>

	<?php } ?>
	</div>
	<div id="tag_parent" class="form-inline"></div>
	<button type="button" class="btn btn-dark"
        id="add_tagform">タグを追加</button>
	
	<input type="hidden" id="add_num" name="add_num" value="">
 </div>

	<?php if(isset($formar["id"])){ ?>
		<input type="hidden" name="aim_id" value="<?php echo $formar["id"]; ?>">
	<?php } ?>

<a id="cancel" class="btn btn-secondary"
href="<?php echo site_url('admin_animal/editmenu'); ?>" role="button">
キャンセル</a>

 <button type="submit" class="btn btn-dark" name="posted"
 id="edit_btn" value="posted">編集する</button>


<?php echo form_close(); ?>
</div> <!--editform-->
</div> <!--main-->

</body>
</html>

<script src="<?php echo base_url()?>assets/js/admin/animal_edit_js.php"></script>

