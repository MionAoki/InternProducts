		<?php if(isset($tag_name)){
                 for($i=0; $i<count($tag_name); $i=$i+1){ ?>
                 <p class="text-primary" style="display: inline-block; padding:0px 10px;">
                 #<?php echo $tag_name[$i]; ?></p>
                 <?php }} ?>
		<?php if(isset($keyword)){ ?>
		 <p class="text-primary" style="display: inline-block; padding:0px 10px;">
		 検索ワード:&emsp;<?php echo $keyword; ?></p>
		 <?php } ?>


<table class="table">
                <?php
                $num = 0;
                foreach($results as $row){
                $id = $row->id;
		$name = $row->name;
                $point = $row ->point; ?>

                <?php if($num % 2 == 0){ ?>
                <tr>
                <?php } ?>

                <td class="border">
		<a href="<?php echo site_url('introduce/detail/'.$id.''); ?>">
                <br>
                <p style="font-weight:bolder;"><?= $name ?></p>
                        <hr>
                <font size="2"><?= $point ?></font>
                </td>

                <?php if($num  % 2 != 0){ ?>
                </tr>
                <?php } ?>

                <?php
                 $num = $num + 1;
                ?>

		<?php }?>

</table>






