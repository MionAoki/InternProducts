<!--参加目的-->
<div class="tab-pane fade" id="purpose" role="tabpanel"
aria-labelledby="purpose-tab">
	<?php $attributes = array("class" => "edit_data");
        echo form_open('admin_profdata/edit', $attributes);?>

         <button type="submit" class="btn btn-dark" name="add_kind"
         onclick="location.href='<?php echo site_url('admin_profdata/edit'); ?>'"
         value="purpose">参加目的を追加する</button>
        
	<div class="list">
         <table>
                <tr>
                <th></th>
                <th>参加目的</th>
                </tr>
         <?php foreach($purpose as $list){?>
                <tr>
                <td>
		 <button type="button" class="btn btn-dark" value="<?php echo $list->list; ?>"
                 id="purpose<?php echo $list->id;?>" onclick="delData(this.value,this.id)">削除</button>

                 <button type="submit" class="btn btn-dark" value="purpose<?php echo $list->id;?>"
                 name="select_edit">編集</button>
                </td>

                <td><?php echo $list -> list;?></td>
                </tr>
         <?php }?>
         </table>
        </div> <!--list-->
	<?php echo form_close(); ?>
</div>
