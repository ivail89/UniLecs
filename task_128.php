<?php
/*
 * Анонс #128. "Максимальное" разбиение числа
 * Задача: дано натуральное числа N. Необходимо разложить его на натуральные слагаемые таким образом,
 * чтобы их произведение было максимальным.
 * Входные данные: N - натуральное число от 4 до 100
 * Вывод: максимальное произведение слагаемых при разбиении числа N
 */
require_once 'functions.php';
$n = 5;
$vars = getAllSummands($n,$n);
$max = [
  'members' => 0,
  'mult' => 0
];
foreach ($vars as $var) {
  $mult = 1;
  foreach ($var as $v) {
    if ($v == 0) continue;
    $mult *= $v;
  }
  if ($mult > $max['mult']) {
    $max = [
      'members' => $var,
      'mult' => $mult
    ];
  }
}

print_r($max);