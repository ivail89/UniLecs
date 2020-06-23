<?php
/*
 * Задача 99: Непростая сортировка
 *
 * Дан массив натуральных чисел, представленных в виде строк. Вам необходимо вывести максимальное число, ктр можно составить из имеющихся чисел.
 * Входные данные: arr - строковый массив, элементы ктр - натуральные числа, представленные в виде строк. Размер массива не больше 100.
 * Вывод: вывести максимально возможное число (либо строкой либо числом), ктр можно составить из имеющихся чисел в заданном массиве.
 *
 * Пример: arr = [ "123", "124", "56", "90"]
 * Answer = "9056124123"
 *
 */
require_once 'functions.php';

$arr = [ "123", "124", "56", "90"];
$res = '';
// Так как 123 больше, чем 56 математически, но по условию задачи 56 должно быть раньше
// допишем нули в конце каждого число, чтобы все числа имели один разряд
$max_len = 0; // Максимальная длина числа
foreach ($arr as $val) {
  if (strlen($val) > $max_len) {
    $max_len = strlen($val);
  }
}
// формируем массив с дописанными нулями в конце
$new_arr = array();
foreach ($arr as $val) {
  $tail = '';
  $count = $max_len - strlen($val);
  for ($i = 0; $i < $count; $i++) {
    $tail .= '0';
  }
  $new_arr [] = $val.$tail;
}

arsort($new_arr);
// ФОрмируем строку
foreach ($new_arr as $k => $v) {
  $res .= $arr[$k];
}

echo $res;