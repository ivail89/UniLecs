<?php
/*
 * Задача: дана строка с кодом шахматного хода, например, "E2-E4".
 * Необходимо определить, является ли заданный код - ходом коня.
 *
 * Входные данные: строка с 5ю символами: (Буква)(Цифра)(Дефис)(Буква)(Цифра). Буквы - заглавные буквы англ.алфавита.
 * Все символы заданы в кодировке ASCII.
 *
 * Вывод: TRUE/FALSE - является ли заданный ход - ходом коня.
 *
 * Пример:
 *  "E2-E4" -> False
 *  "B1-C3" -> True
 *  "A1-A9" -> False
 *  "A1-B3" -> True
 */

require_once 'functions.php';

$arr = [
  "E2-E4",
  "B1-C3",
  "A1-A9",
  "A1-B3"
];

foreach ($arr as $str) {
  if (preg_match('/^[A-H][1-8]-[A-H][1-8]$/', $str)){
    $ld = abs(ord($str) - ord($str[3]));
    $fd = abs($str[1] - $str[4]);
    if (($ld == 1 && $fd == 2) || ($ld == 2 && $fd == 1)) {
      echo $str . ' -> true' . PHP_EOL;
    } else {
      echo $str . ' -> false' . PHP_EOL ;
    }
  } else {
    echo $str . ' -> false' . PHP_EOL ;
  }
}
