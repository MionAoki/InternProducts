<?php $attributes = array("class" => "edit_data");
echo form_open('admin_timetable/edit', $attributes);?>

<div class="list">
<table>
	<tr>
	<th></th>
	<th>開始時間</th>
	<th>終了時間</th>
	<th>予約状況</th>
	</tr>

<?php foreach($DateList as $value){ ?>
	<tr>
	<td>
	<button type="button" class="btn btn-dark" id="del<?php echo $value["ScheduleId"]; ?>" 
	onclick="delData(this.id)">削除</button>

	<button type="submit" class="btn btn-dark" value="edit<?php echo $value["ScheduleId"]; ?>"
        name="content">編集</button>

	</td>

	<td><?php echo date("H:i",strtotime($value["startTime"])); ?></td>
	<td><?php echo date("H:i",strtotime($value["endTime"])); ?></td>
	<td><?php echo $value["set_animal"]; ?></td>
	</tr>
<?php } ?>


</table>
</div> <!-- list -->

<?php echo form_close(); ?>

<!--モーダルウィンドウ-->
<div id="modalDelete" class="modalNoDisp">
<div class="delWindow">
        <p>データを削除しますか？</p>
        <?php $attributes = array("class" => "del_data");
        echo form_open('admin_timetable/deldata', $attributes);?>
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

<script src="<?php echo base_url()?>assets/js/admin/admin_timetable_js.php"></script>



