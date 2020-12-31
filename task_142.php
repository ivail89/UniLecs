<?php
/*
 * Анонс #142. Сравниваем строковые числа
 * Задача: даны 3 натуральных числа, каждое из чисел дано в виде строки. Необходимо вывести наибольшее число.
 * Входные данные: a, b, c - натуральные числа от 1 до ~, заданные в виде строки, числа записаны без ведущих нулей.
 * Вывод: наибольшее число.
 *
 */
require_once 'functions.php';

$arr = [ // сразу задам в виде массива
  "987531234567891",
  "1234",
  "987531234567890"
];

// так как ведущие нули не заданы, сразу грохнем числа меньшей длины
$length = [];
foreach ($arr as $el) {
  $length [] = strlen($el);
}
asort($length);
$max = max($length);
foreach ($length as $k => $v) {
  if ($v < $max) {
    unset($arr[$k]);
  }
}

$arr = array_unique($arr);
$arr = array_values($arr);

// процесс сравнения
$i = 0;
while (count($arr) > 1) {
  $max = $arr[0][$i];
  $max_idx = 0;
  foreach ($arr as $k => $v) {
    if ($max < $v[$i]){
      unset($arr[$max_idx]);
      $max = $v[$i];
      $max_idx = $k;
    } elseif ($max > $v[$i]) {
      unset($arr[$k]);
    }
  }
  $i++;
}

print_r($arr);