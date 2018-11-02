<?php
/**
 * Вывести слова строки в порядке возврастания
 */

function maxLength($str){
  $words = explode(' ', $str);
  $lengths = array();
  for ($i = 0; $i < count($words); $i++){
    $lengths[$i] = strlen($words[$i]);
  }
  asort($lengths);
  foreach ($lengths as $key => $value){
    echo $words[$key].'<br/>';
  }
}

$str1 = "boB bbo 123123";
$str2 = "123 bbo132 boB";
$str3 = "tcAtt";

maxLength($str1);
echo '<br/>';
maxLength($str2);
echo '<br/>';
maxLength($str3);