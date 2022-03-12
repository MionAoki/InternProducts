	<table class="timeframe"
         style=" border-collapse:separate;
         margin:10px auto; width:90%;">

	<?php 
	 $cnt = 0;
	 $keycnt = 0;
	 $key = array_keys($timeMass); //区切り時間
	 foreach($timelist as $row){
	 $sTime = $row->startTime;
	 $eTime = $row->endTime;

	 $filled = $row->filled_animalid;
	 $filled_array = replace($filled);
	
	 $nospace = 0; 
	 for($i=0;$i<count($filled_array);$i=$i+1){
		if($filled_array[$i] == $animalid){
		 $nospace = $nospace + 1;
		}
	 }

	 if($sTime >= $key[$keycnt]+1){
		$keycnt = $keycnt + 1;
		$cnt = 0;
	 }
	?>

	 <tr>
	 <?php if($cnt == 0){ ?>
	 <td rowspan="<?php echo $timeMass[$key[$keycnt]]; ?>"
	 style="padding: 0px 10px; background: #ccffe5;">
	 <p style="margin:0;">
		<?php echo date("H:i",strtotime($key[$keycnt])); ?> ~
	 </p>
	 </td>
	 <?php $cnt = $cnt + 1;}?>


	 <?php if($nospace == 0){ ?>
	 <td style="display: flex; justify-content:space-between;
	 padding:20px 10px 20px 10px; margin:5px;
	 background: #e5ffe5;">
	 <p style="margin:0; font-size:14pt; letter-spacing:-1px;">
	 <?php echo date("H:i",strtotime($sTime)); ?>&nbsp;
	 ~&nbsp;<?php echo date("H:i",strtotime($eTime)); ?></p>
	
	 <button type="button" id="booking"
	 class="btn btn-primary" style="font-size:10pt;"
	 onclick="modalOpen()"><span>予約</span><span>する</span></button>
	 
	 <?php }else{ ?>
         <td style="display: flex; justify-content:space-between;
         padding:20px 10px 20px 10px; margin:5px;
         background: #e8e8e8;">
	
         <p style="margin:0; font-size:14pt; letter-spacing:-1px;
	 color: #8d8d8d;">
         <?php echo date("H:i",strtotime($sTime)); ?>&nbsp;
         ~&nbsp;<?php echo date("H:i",strtotime($eTime)); ?></p>
	 <p style="margin:0; font-size:10pt; color: #8d8d8d;">
	 予約枠が<br>埋まっています</p>
	 <?php }?>

	 </td>
	 </tr>

	<?php } ?>
	 </table>



<!--モーダルウィンドウ-->
<div id="modalArea" class="modalNoDisp">
	<div class="modalWindow">
		<p style="text-align: right">
		<input type="button" value="閉じる" class="btn btn-info"
		style="width:80px" onclick="modalClose()"></p>
		<p style="text-align: center">お名前とご連絡先メールアドレスを入力してください</p>
		<form>
			<div class="form-group col-sm-6">
			<label for="name">お名前&nbsp;(例:青木 ちくわ)</label>
			<input type="text" class="form-control" id="name">
			</div>
			<div class="form-group col-sm-6">
			<label for="hurigana">ﾌﾘｶﾞﾅ&#8251;半角ｶﾅ&nbsp;(例:ｱｵｷ ﾁｸﾜ)</label>
			<input type="text" class="form-control" id="hurigana">
			</div>
			<div class="form-group col-sm-6">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" id="email">
                        </div>
			
			<input type="button" value="予約する" class="btn btn-primary"
			style=""></p>
		</form>
	</div>
</div>


