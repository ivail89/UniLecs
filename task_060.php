<?php
/*
 * Task 60. "Сложение" связных списков
 *
 * Задача: два числа хранятся в виде связных списков, в которых каждый узел представляет один разряд.
 * Все цифры хранятся в обратном порядке, при этом младший разряд (единицы) хранится в начале списка. Размер списков одинаков.
 * Напишите функцию, которая суммирует два числа и возвращает результат в виде связного списка.
 *
 * Пример: Ввод: (4->5->7) + (8->2->1), то есть 754 + 128.
 * Вывод: 2 8 8 (то есть сумма 882)
 *
 * Решение: перевожу число к обычному виду складываю и перевожу обратно
 */

include_once ('functions.php');
//list($list1, $list2) = [[4, 5, 7], [8, 2, 1]];
//list($list1, $list2) = [[5, 5], [8, 9, 1]];
list($list1, $list2) = [[8, 8, 8], [2, 2, 2]];

// Формируем первое число
list($number1, $degree) = [0, 1];
foreach ($list1 as $value){
  $number1 += $value * $degree;
  $degree *= 10;
}

// Формируем второе число
list($number2, $degree) = [0, 1];
foreach ($list2 as $value){
  $number2 += $value * $degree;
  $degree *= 10;
}

// Формируем новый список
$sum  = $number1 + $number2;
$new_list = [];
while ($sum > 10){
  $new_list[] = $sum % 10;
  $sum = intdiv($sum, 10);
}
$new_list[] = $sum; // дописываем последние число в список

print_r($new_list);