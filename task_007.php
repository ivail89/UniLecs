<?php
/**
 * Определить слово максимальной длины в строке.
 */

function maxLength($str){
  $arr = explode(' ', $str);
  $maxWords = array_shift($arr);
  foreach ($arr as $word){
    if (strlen($maxWords) < strlen($word)) $maxWords = $word;
  }
  return "$maxWords <br/>";
}

$str1 = "boB bbo 123123";
$str2 = "123 bbo132 boB";
$str3 = "tcAtt";

echo maxLength($str1).maxLength($str2).maxLength($str3);