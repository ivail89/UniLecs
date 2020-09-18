<?php
/*
 * Анонс #136. Custom String.IndexOf()
 * Задача: в исходной строке необходимо найти первое и последнее вхождение заданного символа. Если символа в строке нет, выведите -1.
 * Входные данные: str - входная строка в кодировке Unicode, кол-во символов в строке не больше 10^3. Symbol - символ в кодировке Unicode.
 * Вывод: первое и последнее вхождение заданного символа в исходной строке.
 */
$str1 = 'AbcAde';
$str2 = 'bbcAde';
$str3 = 'bbcdef';
$letter = 'A';

// Идея простая пройти по всей строке и записать первый и последний вариант, отработка встроенных функций php
function firstLast($str, $letter)
{
  $first = $last = -1;
  if (strpos($str, $letter) !== false) {
    $first = strpos($str, $letter);
    $last = strrpos($str, $letter);
  }

  echo "($first; $last) <br>";
}

firstLast($str1, $letter);
firstLast($str2, $letter);
firstLast($str3, $letter);
