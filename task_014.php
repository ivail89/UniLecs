<?php
/**
 * Функция возвращает строку в обратном порядке
 */

function changeWords($str){
  $arr = explode(' ', $str);
  $arr = array_reverse($arr);
  return implode(' ', $arr);
}

$str1 = "Ручное назначение реестрового номера";
$str2 = "123 bbo132 boB";
$str3 = "For this tutorial";

echo changeWords($str1).'<br/>';
echo changeWords($str2).'<br/>';
echo changeWords($str3).'<br/>';