<?php

/*
 * UniLecs #139. Произведение чисел в массиве между минимальным и максимальным элементом
 * Задача: дан массив целых чисел. Необходимо вычислить произведение чисел в массиве между минимальным и максимальным элементом.
 * Известно, что минимальный и максимальный элемент встречается в массиве только один раз.
 *
 * Входные данные: arr - массив целых чисел, размер массив не более 100. Элементы массива по модулю не более 100.
 *
 * Вывод: произведение чисел, расположенные между минимальным и максимальным элементами.
 *
 * Пример:  [ -2, 4, -1, 5, 10 ]
 * Answer: 4*-1*5 = -20
 */

$arr = [-2, 4, -1, 5, 10];
$min = $arr[0];
$max = $arr[0];

foreach ($arr as $a) {
  if ($min > $a) {
    $min = $a;
  } elseif ($max < $a) {
    $max = $a;
  }
}

echo $max * $min;