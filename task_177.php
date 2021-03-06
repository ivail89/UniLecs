<?php
/*
 * Distinct Array
 *
 * Задача: дан массив целых чисел, отсортированный по возрастанию. Необходимо удалить из него дублирующиеся элементы таким образом,
 * чтобы каждое число в нем встречалось только один раз.
 *
 * Условие: для преобразования использовать только исходный массив.
 * Входные данные: arr - массив целых чисел, размер массива от 1 до 10^6.
 *
 * Вывод: исходный отсортированный массив с удаленными дублирующими элементами.
 *
 * Пример: arr = 1, 1, 2, 2, 2, 3
 * Answer = 1, 2, 3
 */
require_once 'functions.php';

$arr = [1, 1, 2, 2, 2, 3];
$cur = $arr[0];
$cnt = count($arr);

for ($i = 1; $i < $cnt; $i++) {
  if ($cur == $arr[$i]) {
    unset($arr[$i]);
  } else {
    $cur = $arr[$i];
  }
}

printArray($arr);