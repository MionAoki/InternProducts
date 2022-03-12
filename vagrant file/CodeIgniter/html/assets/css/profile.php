<?php header('Content-Type: text/css; charset=utf-8'); ?>

.wholepage{padding-top:30px;}

.modalNoDisp{ display: none;}
.modalBg
{
	position   : fixed;
	overflow   : hidden;
	top        : 0;
	right      : 0;
	bottom     : 0;
	left       : 0;
	background : rgba(234,255,234,0.5);
	z-index    : 10;
}
.modalBgOpen{animation: bgOpenAnime 0.1s ease;}
.modalBgClose{bottom: 100%; animation: bgCloseAnime 0.1s ease;}

.user
{
	margin:0px 50px auto auto; width:200px; text-align:center;
	background: #ffffdb;
	padding:10px; border-radius:5px;
}
.account_menu
{
	z-index:10; width:200px; position:absolute; top:85px; right:50px;
	background: #ffffdb;
	padding:10px; border-radius:0 0 5px 5px;
}
.main
{
	background: rgba(240,248,255,0.95); //#f0f8ff;
	width:800px;
	margin: 10px auto auto auto;
	padding: 30px 80px;
	text-align:center;
}
.profile{padding:15px; text-align:left;}

