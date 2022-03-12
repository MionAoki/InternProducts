<?php header('Content-Type: text/css; charset=utf-8'); ?>

body{
background: #f2f2f2;
}
.main{
background: #fafafa;
text-align: center;
width:80%;
margin: 20px auto 20px auto;
padding: 30px 0 30px 0;
}

.date label{font-size:17px; font-weight: bold;}
.date input{width:30%; margin:auto;}

.list{
padding: 20px;
margin-right:10%;
}
.list table{
table-layout: fixed;
font-size:13px;
margin:auto;
}
.list th{
border: solid 1px black;
background-color: #dfdfdf;
font-size:17px;
text-align: center;
}

.list td{
border: solid 1px black;
width:150px;
text-align:center;
}

.list th:nth-child(1),td:nth-child(1)
{
border: solid 1px #fafafa;
border-right: solid 1px black;
background-color: transparent;
width:20%;
}

.list td:nth-child(4)
{
width:300px;
}

#add_form{margin-bottom: 20px;}

#add_btn,#backmain{width: 70%;}

#edit_btn{width: 200px;}


