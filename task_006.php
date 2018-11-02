<?php
/**
 * Задача: Определить является ли строка перестановкой другой строки.
 */

function permutationStr($str1, $str2){
  // в задаче про учет регистра ничего не сказано
  $str1 = mb_strtolower ($str1);
  $str2 = mb_strtolower ($str2);

  if ($str1 == $str2) return 'Cтроки могут быть перестановками друг друга <br/>';
  if (strlen($str1) != strlen($str2)) return 'Cтроки могут не быть перестановками друг друга <br/>';

  $arr1 = str_split($str1);
  rsort ($arr1);
  $arr2 = str_split($str2);
  rsort($arr2);
  for ($i = 0; $i < count($arr1); $i++){
    if ($arr1[$i] != $arr2[$i]){
      return 'Cтроки могут не быть перестановками друг друга <br/>';
    }
  }

  return 'Cтроки могут быть перестановками друг друга <br/>';
}

$str1 = "boB bbo 123123";
$str2 = "123 bbo132 boB";
$str3 = "tcAtt";

echo permutationStr($str1, $str2).permutationStr($str2, $str3);