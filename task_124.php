<?php
/*
 * Анонс #124. Диверсификация
 * Задача: у вас есть портфель ценных бумаг: A1, A2, A3,..., An.
 * Необходимо диверсифицировать его на два отдельных портфеля, но так, чтобы разница в стоимости этих портфелей была минимальной.
 *
 * Входные данные: Shares[] - массив ценых бумаг, где Shares[i] - цена i-й акции.
 * Размер массива от 1 до 20, цена любой акции от 1 до 10^3.
 *
 * Вывод: FirstShares[], SecondShares[] - массивы с ценами бумаг для 1го и 2го портфеля соот-но, а также стоимость каждого из портфелей.
 * Пример: Shares = [1, 2, 3, 3]
 * FirstShares = [1, 3], FirstTotalValue = 4;
 * SecondShares = [2, 3], SecondTotalValue = 5
 */
require_once 'functions.php';

$shares = [1, 2, 3, 3];
$count = count($shares);
$vars = setsOfBits($count); // получаем все варианты перестановок
$delta = array();
foreach ($vars as $k => $v) { // разбираем по принципу 1 - в первую кучу, 0 - во вторую кучу
  $sl = strlen($v);
  list ($first, $second) = [0, 0];
  for ($i = 0; $i < $sl; $i++) {
    $first +=   $v[$i] ? $shares[$i] : 0 ;
    $second += !$v[$i] ? $shares[$i] : 0 ;
  }
  $delta[$k] = abs($second - $first); // вычисляем разницу между кучами
}

$min_delta = array_keys($delta, min($delta)); // находим минимальное значение разницы между кучами
$firstShares = array();
$secondShares = array();
for ($i = 0; $i < $count; $i++) { // собираем вывод согласно условиям задачи
  if ($vars[$min_delta[0]][$i] == '1') {
    array_push($firstShares, $shares[$i]);
  } else {
    array_push($secondShares, $shares[$i]);
  }

}
print_r($firstShares);
print_r($secondShares);