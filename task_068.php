<?php
/*
 * Задача: сколько n-значных чисел можно составить, используя цифры 4 и 7, в которых три одинаковые цифры не стоят рядом ?
 * Входные данные: Одно число n, где n <= 30.
 * Вывод: Кол-во n-значных чисел.
 *
 * Пример: 3
 * 447, 474, 747, 774, 477, 744
 * Вывод: 6.
 *
 * Идея: рекурсивно собирем все варианты
 */
include_once ('functions.php');
$n = 3;

function sets47($n){
  if ($n == 1) return [4, 7]; // Крайние границы для выхода из рекурсии
  if ($n == 2) return [44, 47, 74, 77]; // Крайние границы для выхода из рекурсии
  $arr = sets47($n-1);
  $res = []; // Итоговый массив
  foreach ($arr as $a) {
    $tmp = $a * 10 + 4; // Добавляем 4 к концу числа
    if ($tmp % 1000 != 444) $res[] = $tmp; // Проверяем, что бы не было 3х четверок
    $tmp = $a * 10 + 7; // Добавляем 7 к концу числа
    if ($tmp % 1000 != 777) $res[] = $tmp; // Проверяем, что бы не было 3х четверок
  }
  return $res;
}

$res = sets47($n);
print_r($res);