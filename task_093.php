<?php
/*
 * Задача 93: Очередь за билетами
 *
 * За билетами в кино выстроилась очередь из N человек. Кассир продает не более 3х билетов в одни руки.
 * Известно, что на продажу i-му человеку из очереди 1го билета кассир тратит Ai секунд, на продажу 2х билетов - Bi секунд, 3х билетов - Ci секунд.
 * Необходимо выяснить минимальное время, за ктр все покупатели могли бы приобрести билеты.
 * Билеты на "группу" людей всегда покупает только первый из группы. Также никто в целях ускорения не покупает лишних билетов (т.е. билетов, ктр никому не нужны).
 *
 * Входные данные: N - кол-во покупателей в очереди, N меньше 1000.
 * A, B, C - массивы натуральных чисел, ктр хранят значения времени продажи одного, двух и трех билетов i-му покупателю. Значения в массиве не превышают 1000.
 *
 * Вывод: минимальное время, за ктр все покупатели смогут приобрести билеты.
 * Пример: N = 5;
 * A = [5, 2, 5, 20, 20]
 * B = [10, 10, 5, 20, 1]
 * C = [15, 15, 5, 1, 1]
 * MinTime = 12
 *
 * Чтобы все смогли купить билеты нужно, покупать в последовательности A[0], A[1], C[3]
 *
 * Используем динамическую последовательность
 */
require_once 'functions.php';

$n = 5;
$a = [5, 2, 5, 20, 20];
$b = [10, 10, 5, 20, 1];
$c = [15, 15, 5, 1, 1];

// Массив времени на продажу для всей очереди, храним только минимальные значения для i-го члена очереди
$t = [
  0 => 0,
  1 => $a[0],
  2 => min($b[0], $a[0]+$a[1]),
];

for ($i = 3; $i < $n + 1; $i++) {

  $t[$i] = min(
    $t[$i-1] + $a[$i-1], // Выгоднее купить текущему
    $t[$i-2] + $b[$i-2], // Выгоднее купить предыдущему сразу два
    $t[$i-3] + $c[$i-3] // Выгоднее купить пред-предыдущему сразу три
  );
}

echo $t[$n];