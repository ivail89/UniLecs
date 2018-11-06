<?php
/**
 * Вернуть первый уникальный символ в строке
 */

function uniqueSymbol($str){
  $arrSymbols = array();
  for ($i = 0; $i < 256; $i++){
    $arrSymbols[chr($i)] = 0;
  }
  for ($i = 0; $i < strlen($str); $i++){
    $arrSymbols[$str[$i]]++;
  }
  for ($i = 0; $i < strlen($str); $i++){
    if ($arrSymbols[$str[$i]] == 1) return $str[$i];
  }
  return "Уникальных символов - нет";

}

$str1 = "boB bbo 123123";
$str2 = "123 bbo132 boB";
$str3 = "tccAAtt";

echo uniqueSymbol($str1).'<br/>'.uniqueSymbol($str2).'<br/>'.uniqueSymbol($str3);