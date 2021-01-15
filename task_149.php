<?php
/*
 * Анонс #149. Pit-stops
 * Задача: на кольцевом треке расположены N пит-стопов. Если у спорткара случилась поломка или закончилось топливо,
 * то пилот может доехать до ближайшего пит-стопа (можно сдать назад до пит-стопа, если он находится ближе всех).
 * Необходимо определить максимально возможное расстояние до ближайшего пит-стопа в случае поломки или нехватки топлива.
 *
 * Входные данные: pitstops[] - массив позиций пит-стопов, Dist - общая дистанция трека.
 * Вывод: максимально возможное расстояние до ближайшего пит-стопа.
 * Пример: pitstops = [4.5, 0.5, 2, 1], Общая дистанция трека = 5. Answer = 1.25
 *
 */

require_once 'functions.php';
$pitstops = [4.5, 0.5, 2, 1];
$dist = 5;

// Необходимо найти самый длинный отрезок между питстопами, его середина и будет максимальным
// так как кольцевые необходимо "незабыть" вычислить расстояние между последним и первым питстопами

sort($pitstops);
$max_dist = $pitstops[1] - $pitstops[0];
$len = count($pitstops)-1;
for ($i = 1; $i < $len; $i++) {
  if ($max_dist < ($pitstops[$i + 1] - $pitstops[$i])) {
    $max_dist = $pitstops[$i + 1] - $pitstops[$i];
  }
}

// считаем расстояние между последним и первым
$tmp = $dist - $pitstops[$len] + $pitstops[0];
if ($max_dist < $tmp) {
  $max_dist = $tmp;
}

printf('%.3f', $max_dist / 2);