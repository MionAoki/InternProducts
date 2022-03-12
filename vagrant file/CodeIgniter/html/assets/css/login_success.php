<?php header('Content-Type: text/css; charset=utf-8'); ?>

.wholepage
{
	display: flex;
}
.main
{
	background: rgba(240,248,255,0.95);
	text-align: center;
	width:900px;
	margin: 30px auto auto auto;
	padding-top: 20px;
	padding-bottom: 20px;
}
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
.modalBgOpen {animation: bgOpenAnime 0.1s ease;}
.modalBgClose {bottom: 100%; animation: bgCloseAnime 0.1s ease;}
.modalBg .modalWindow
{
	position      : absolute;
	top: 400px; left: 50%;
	padding: 40px;
	padding-bottom: 20px;
	transform: translate(-50%, -50%);
	z-index: 11;
	min-width     : 700px;
	min-height    : 220px;
	background    : rgba(255,255,255,0.9);
	text-align    : left;
}

input[type=checkbox]{display: none;}
.label
{
	border: 1px solid #8d8d8d; padding:10px 20px;
	border-radius: 5px;
	color: #8d8d8d;
	background-color: #e8e8e8;
	margin: 5px 10px;
}
input[type="checkbox"]:checked +
label{border: 1px solid #65ab31; background: #65ab31; color: #ffffff;}

.form-row
{
	text-align:center;
	margin: 10px 20%;
}

.input-keyword{width: 40%;}

.table
{
	border-spacing : 10px;
	border-collapse:separate;
	width: 90%;
	table-layout: fixed;
	word-wrap: break-word;
	text-align:center;
	margin:auto;
}

.table td{ padding: 0; margin: 5px;}
.table td a
{
	padding: 10px;
	color: black;
	display:block;
	width:100%;
	height:100%;
	text-decoration: none;
	line-height: 1.4;
}
.table a:hover { background-color: #ccffe5; }

.border
{
	border:1px;
	background:#ffffff;
	height: 100px;
}

.subpage{width:20%;}
.fixed_buttun{
	position:-webkit-sticky; top:50;
	position: sticky; background:#ffffdb;
	border-radius:5px;
	padding:10px; margin:auto;
}
.user .account_menu{ padding-top:15px;}


