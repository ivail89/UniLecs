<?php
/*
 * Анонс #150. Double Reverse
 * Задача: дан массив целых чисел. Необходимо сначала сделать "реверс" от элемента с индексов ind_1 до элемента с индексом ind_2,
 * затем - от элемента с индексом ind_3 до элемента с индексом ind_4.
 *
 * Входные данные: arr - массив целых чисел, где размер массива от 1 до 10^3.
 * ind_1 < ind_2, ind_3 < ind_4, ind_1, ind_2, ind_3, ind_4 от 1 до 10^3.
 *
 * Вывод: массив после преобразований.
 * Пример: arr = [1, 2, 3, 4, 5, 6, 7, 8, 9]
 * ind_1 = 1, ind_2 = 4, ind_3 = 5, ind_4 = 8
 * Answer: arr = [1, 5, 4, 3, 2, 9, 8, 7, 6]
 *
 * Условие: запрещено использовать доп.O(n) памяти, использовать только исходный массив для преобразования.
 */
require_once 'functions.php';

function reverse_array(&$arr, $ind1, $ind2)
{
  while ($ind2 - $ind1 > 0 && $ind2 > $ind1) {
    list($arr[$ind1], $arr[$ind2]) = [$arr[$ind2], $arr[$ind1]];
    $ind1++;
    $ind2--;
  }
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
reverse_array($arr, 1, 4);
reverse_array($arr, 5, 8);
printArray($arr);