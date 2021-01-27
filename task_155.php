<?php
/*
 * Анонс #155. Алгоритм сжатия RLE
 * Задача: дана строка, необходимо написать алгоритм сжатия RLE, заменяющий повторяющиеся символы (серии) на один символ и число его повторов.
 * Примечание: упростим алгоритм сжатия RLE: если полученная строка оказалась больше исходной, то вывести исходную.
 * Входные данные: str - строка, состоящая из буквенных символов, в кодировке Unicode, размер строки от 1 до 1000.
 * Вывод: "сжатую" по алгоритму RLE строку.
 *
 * Пример:
 * 1. str = "зззААнууууДааааа" Answer = "з3А2н1у4Д1а5"
 * 2. str = "abc" Answer = "abc"
 */
require_once 'functions.php';

echo rle('зззААнууууДааааа') . PHP_EOL;
echo rle('abc') . PHP_EOL;

function rle(string $str)
{
  $len = mb_strlen($str);
  $new_str = '';
  $l = 1;
  $current = mb_substr($str, 0, 1);
  for ($i = 1; $i < $len ; $i++) {
    $char = mb_substr($str, $i, 1);
    if ($char == $current) {
      $l++;
    } else {
      $new_str .= $current . $l;
      $current = $char;
      $l = 1;
    }
  }
  $new_str .= $current . $l;
  return $len > mb_strlen($new_str) ? $new_str : $str;
}