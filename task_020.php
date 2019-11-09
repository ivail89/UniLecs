<?php
/**
 * Задача: дана строка STR, степенью K строки STR будет строка вида: STR1+STR2+... +STRk (плюс означает конкатенацию).
 * Корнем k степени из строки STR называется такая строка T (если это возможно), что T степени K  =  STR.
 * Написать функцию, ктр выводит строку STR в степени K.

 * Например:
 * 1. STR ="abc", K = 3; STR степени K = "abcabcabc"
 * 2. STR ="abcabc", K = -2; STR степени K = "abc"
 * 3. STR ="abcabc", K = -3; STR степени K = "some error message"
 */

$str1 ="abc";
$str2 ="abcabc";
$str3 ="abcabc";

/*
 * $str - входящая строка
 * $k - степень
 */
function degreeString($str, $k){
  // Если степень выше или равна 0, то просто склеиваем новую строку
  if ($k >= 0){
    $str_res = '';
    for ($i = 0; $i < $k; $i++) $str_res .= $str;
    return $str_res;
  }
  if ($k < 0){
    $str_len = strlen($str);
    // Строку нельзя разделить на равное количество частей
    if (($str_len % (-$k)) != 0) return "some error message";

    $sub_str_len = $str_len / (-$k);
    $arr_str = str_split($str, $sub_str_len);
    // Если хоть один образованный кусок отличается, значит получить корень нельзя
    if (count(array_unique($arr_str)) != 1) return "some error message";
      else return $arr_str[0];
  }
}

echo degreeString($str3, -3);