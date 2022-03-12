<?php header('Content-Type: text/css; charset=utf-8'); ?>

.wholepage{
display: flex; justify-content:space-between;
flex-wrap: nowrap; text-align: center;
margin:20px 10px auto 10px; background: #f0f8ff;}

.pagecontents
{
display: flex;
}

.main
{
/*background: #f0f8ff;*/
text-align: center;
margin:40px 0px 40px 60px;
padding:20px 0px;
}

.img{ margin-bottom: 10px;}
.img img{width:450px;}
.feat{ width: 600px; margin: auto; text-align: left;
background: #ccffe5; line-height: 40px;}

.tag{ max-width: 700px; margin: auto; padding:10px;  background: #ccffe5;}
.tag a{
display: inline-block; padding:0px 10px;
line-height:0; text-decoration: none;}

.timetable
{
background: #e5ffcc;
text-align: center;
width:100%;
margin: 40px 60px 40px 5px;
padding: 30px 10px;
}

input[type=radio]{display: none;}
.radio label{
border: 1px solid #8d8d8d; padding:10px 20px;
border-radius: 5px;
color: #8d8d8d;
background-color: #e8e8e8;
margin: 5px 10px;
}
input[type="radio"]:checked +
label{border: 1px solid #65ab31; background: #65ab31; color: #ffffff;
padding:10px 20px;}

.back_page
{
margin: 20px 0px;
}

.modalNoDisp{ display: none;}

.modalBg {
position   : fixed;
overflow   : hidden;
top        : 0;
right      : 0;
bottom     : 0;
left       : 0;
background : rgba(234,255,234,0.5);
z-index    : 10;
}

.modalBgOpen {
animation  : bgOpenAnime 0.1s ease;
}
.modalBgClose {
bottom     : 100%;
animation  : bgCloseAnime 0.1s ease;
}
.modalBg .modalWindow {
position      : absolute;
top: 400px; left: 50%;
padding: 20px;
padding-bottom: 20px;
transform: translate(-50%, -50%);
z-index: 11;
min-width     : 700px;
min-height    : 220px;
background    : rgba(255,255,255,0.9);
text-align    : left;
}

span{display: inline-block;}


