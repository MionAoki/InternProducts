
<div class="user">
                 <button type="button" class="btn btn-info"
                 style="text-align:center; width: 100%;"
                 onclick="menuOpen()">
		 User: <span style="font-size:11pt;"><?php echo $user_name; ?></span></button>
                        <div class="account_menu" id="account_menu"
                        style="text-align: left; list-style: none;">
                        
			<div class="text-info">
                        <li><a href="<?php echo site_url('user_profile/profile');?>">
			プロフィール編集</a></li>
                        <hr>
                        <li><p>ユーザー基本情報</p></li>
                        <li><p>設定</p></li>
                        <hr>
			
			<li><span style="font-weight:bold; cursor: hand; cursor:pointer;"
			onclick="logoutOpen()" class="text-primary">
			ログアウト</span></li>

                        </div>
                        </div>

		<!--モーダルウィンドウ-->
                <div id="modalLogout" class="modalNoDisp">
		 <div class="logoutWindow">
			<p>ログアウトしますか？</p>
			<div style="display:inline-block">
		  	<input type="button" value="Cancel" class="btn btn-secondary"
			style="width:80px;" onclick="logoutClose()">

			<a class="btn btn-primary" role="button"
			style="width:80px;" onclick="logoutClose()"
			href="<?php echo site_url('loggedin/logout'); ?>">
			OK</a>
			</div>
		 </div>
		</div>

<script src="<?php echo base_url()?>assets/js/usermenu_js.php"></script>

</div>

