<div class ="result_msg">
<?php if(isset($msg)){ ?>
<p><?php echo $msg;?></p>
<?php } ?>
</div>

<button type="button" class="btn btn-dark" data-content="add" 
id="add_btn">動物を追加する</button>

<p>&#9826;画像名をクリックすると登録画像が表示されます</p>

         <div class="list">
         <table>
                <tr>
                <th></th>
                <th>動物名</th>
                <th>分類</th>
                <th>特徴</th>
                <th>画像名</th>
                <th>所持タグ</th>
                </tr>
<?php for($i=0;$i<count($list);$i=$i+1){ ?>
                <tr>
                <td>
                <button type="button" class="btn btn-dark" id="<?php echo $list[$i]['name']; ?>"
		onclick="delData(this.id)">削除</button>
                <button type="button" class="btn btn-dark" id="edit<?php echo $i; ?>"
		onclick="editData(this.id)">編集</button>
                </td>
                <td><?php echo $list[$i]['name']; ?></td>
                <td><?php echo $list[$i]['point']; ?></td>
                <td>
                <div style="height:100px;overflow:scroll;">
                <?php echo $list[$i]['introduction']; ?>
                </div></td>
                <td data-toggle="modal" data-target="#show_img"
		id="<?php echo $list[$i]['sub_name']; ?>" onclick="show_img(this.id)">
		<?php echo $list[$i]['sub_name']; ?></td>
                <td><?php echo $list[$i]['tag']; ?></td>
                </tr>
<?php } ?>
         </table>
         </div> <!-- list -->

<a id="backmain" class="btn btn-secondary" href="<?php echo site_url('admin_main/main'); ?>" role="button">メニューに戻る</a>


<!--モーダルウィンドウ-->
<div id="modalDelete" class="modalNoDisp">
<div class="delWindow">
	<p id="delname"></p>
	<p>のデータを削除しますか？</p>
	<?php $attributes = array("class" => "del_data");
	echo form_open('admin_animal/deldata', $attributes);?>
	<input type="hidden" id="delid" name="delid" value="">

	<div style="display:inline-block">
        <input type="button" value="Cancel" class="btn btn-secondary"
        style="width:80px;" onclick="delClose()">

	<button type="submit" class="btn btn-primary" id="del_btn"
	onclick="delClose()" style="width:80px;">OK</button>

	</div>
	<?php echo form_close(); ?>
</div>
</div>


<!--画像preview-->
<div class="modal fade" id="show_img" tabindex="-1"
role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
	 <img id="preview" src="" alt="">
	</div>
 </div>
</div>


<script src="<?php echo base_url()?>assets/js/admin/admin_animal_js.php"></script>

