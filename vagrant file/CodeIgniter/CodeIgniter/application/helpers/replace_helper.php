<?php
if( ! function_exists('replace'))
{
	function replace($word)
	{
	 $conv = str_replace("　", " ", $word);
	 $conv = str_replace("、"," ", $conv);
	 $conv = str_replace(",", " ", $conv);
	 $word_array = explode(" ",$conv);
	 sort($word_array);
	 $word_array = array_filter($word_array,"strlen");
	 $word_array = array_merge($word_array); //空白を削除&詰める

	 return $word_array;
	}
}

if( ! function_exists('convStr'))
{
	function convStr($array) //配列の重複削除&ソート->","区切りの文字列
	{
	 $CI =& get_instance();
         $CI->load->helper('replace');
	 $array = array_values($array);
	 $array = arraySort($array);
	 if(count($array) == 1){
	  $conv = $array[0];
	 }else{
	  $conv = implode(",", $array);
	 }

	 return $conv;
	}
}

if( ! function_exists('arraySort'))
{
        function arraySort($word_array) //重複を削除&ソート
        {
	 if(count($word_array) != 1){
	  $unique = array_unique($word_array);
	  $organize = array_values($unique);
	  sort($organize);
	 
	  return $organize;
	 }else{
	  return $word_array;
	 }
        }
}

if( ! function_exists('delEmpty'))
{
        function delEmpty($word)
        {
	 $conv = str_replace("　", " ", $word);
	 $no_empty = str_replace(" ", "", $conv);
	 if($no_empty == ""){
	  return NULL;
	 }else{
	  return $no_empty;
	 }
	}
}


if( ! function_exists('extractStr')) //文字列から数字を削除
{
	function extractStr($str) //文字列から数字を削除
	{
         $num = preg_replace('/[^0-9]/', '', $str);
         $extracted = strstr($str,$num,true);
         return $extracted;
	}
}



