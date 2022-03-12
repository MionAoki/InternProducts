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

#add_btn,#backmain
{
width:70%;
margin-bottom:20px;
}

p{margin:0;}

.list{
padding: 20px 50px 50px 50px;
}
.list table{
table-layout: fixed;
font-size:13px;
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
.list td:nth-child(4)
{
width: 400px;
text-align:left;
}

.list th:nth-child(1),td:nth-child(1)
{
border: solid 1px #fafafa;
border-right: solid 1px black;
background-color: transparent;
}

.editform{padding:0px 10px;}

.form-group
{
width:70%;
margin:auto;
}
.form-group label, .checkboxes label
{
margin:10px 0px;
}
.form-group textarea{height:180px;}

#tagselect , #tag_parent{text-align:left; width:70%; margin:0px auto;}
#add_tagform{margin:0 auto 20px auto;}
#tag_parent input[type=text]{margin:10px 0px 10px 5px; width:200px;}

input[type=checkbox]{display: none;}
.label
{
border: 1px solid #8d8d8d; padding:5px 8px;
border-radius: 5px;
color: #8d8d8d;
background-color: #e8e8e8;
margin: 5px;
}
input[type="checkbox"]:checked +
label{border: 1px solid #343a40; background: #343a40; color: #ffffff;}

#edit_btn{width:200px;}
.small{font-size:small; margin:0;}

.result_msg p{
background-color: #191970; color: #ffffff;
font-size: 20px;
margin:40px;
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
        background : rgba(128,128,128,0.5);
        z-index    : 10;
}
.modalBgOpen{animation: bgOpenAnime 0.1s ease;}
.modalBgClose{bottom: 100%; animation: bgCloseAnime 0.1s ease;}

.modalBg .delWindow
{
        position      : absolute;
        width:300px;
        height:150px;
        top: 400px; left: 50%;
        padding: 40px;
        padding-bottom: 20px;
        transform: translate(-50%, -50%);
        z-index: 11;
        min-width     : 200px;
        min-height    : 150px;
        background    : rgba(255,255,255,0.9);
        text-align    : center;
}

.delWindow p{margin:0;}




