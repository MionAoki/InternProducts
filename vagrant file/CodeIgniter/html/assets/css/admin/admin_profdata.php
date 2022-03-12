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

#add_btn{margin-left: 30px;}
#backmain{width: 70%;}

.list{
padding: 20px 30%;
}
.list table{
table-layout: fixed;
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
}

.list td:nth-child(2){
width:400px;
}

.tab-content{margin:20px;}

.nav-item a{color:black; font-weight: bold;}

#add_location,#add_sector,#add_job,#add_purpose{width:60%;}


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



