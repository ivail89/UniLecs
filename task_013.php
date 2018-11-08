<?php
/**
 * Функция сжимает строку. Если новая больше, то возвращаем исходную.
 * zzzabbeee => z3a1b2e3
 */

function compressStr($str){
  $arr = str_split($str);
  $arrSplit = array();
  $a1 = array_shift($arr);
  $s = $a1;
  while (count($arr) > 0){
    $a2 = array_shift($arr);
    if ($a1 === $a2){
      $s.=$a2;
      $a1 = $a2;
    } else {
      array_push($arrSplit, $s);
      $s = $a2;
      $a1 = $a2;
    }
  }
  $s = '';
  foreach ($arrSplit as $a){
    $s .= $a[0].strlen($a);
  }
  return (strlen($s) < strlen($str) ? $s : $str);
}

$str1 = "zzzabbeee";
$str2 = "123 bbo132 boB";
$str3 = "tccAAtt";

echo compressStr($str1).'<br/>';
echo compressStr($str2).'<br/>';
echo compressStr($str3).'<br/>';