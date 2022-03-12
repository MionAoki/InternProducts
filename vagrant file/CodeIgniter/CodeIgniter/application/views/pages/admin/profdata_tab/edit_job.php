<!--職種-->
<div class="job-tab">
         <div class="list">
         <table id="table_edit">
                <tr>
                <th></th>
                <th>職種</th>
                </tr>

                <tr>
                <td></td>
                <td>
                 <?php if(isset($formar)){ ?>
                 <input type="text" id="job0" name="job0" class="form-control"
                 value="<?php echo $formar[0]->list; ?>">
                 <?php }else{ ?>
                 <input type="text" id="job0" name="job0" class="form-control"
		 value="<?php echo set_value('job0'); ?>">
                 <span class="text-danger"><?php echo form_error('job0'); ?></span>
                 <?php }?>
                </td>
                </tr>

         <?php for($j=1;$j<$add_num+1;$j=$j+1){ ?>
                <tr>
                <td>
                 <button type="button" class="btn btn-dark" id="<?php echo $j;?>"
                 onclick = function(){deleteBtn(this);}>削除</button>
                </td>
                <td>
                 <input type="text" id="job<?php echo $j;?>" name="job<?php echo $j;?>"
                 class="form-control" value="<?php echo set_value('job'.$j); ?>">
                 <span class="text-danger"><?php echo form_error('job'.$j); ?></span>
                </td>
                </tr>
         <?php } ?>

         </table>
         </div> <!--list-->


         <?php if(isset($formar)){ ?>
         <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $formar[0]->id;?>">
         <?php }elseif(isset($hold_id)){ ?>
         <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $hold_id;?>">
         <?php }else{?>
         <button type="button" class="btn btn-dark" id="add_form">追加</button>
         <input type="hidden" id="add_num" name="add_num" value="<?php echo $add_num;?>">
         <?php }?>

         <br>
         <a id="cancel" class="btn btn-secondary"
         href="<?php echo site_url('admin_profdata/editmenu'); ?>" role="button">キャンセル</a>

<?php if(isset($formar) || isset($hold_id)){ ?>
        <button type="submit" class="btn btn-dark" name="content"
        id="edit_btn" value="edit">編集する</button>
<?php }else{ ?>
        <button type="submit" class="btn btn-dark" name="content"
        id="edit_btn" value="add">編集する</button>
<?php }?>

</div> <!--job-tab-->
