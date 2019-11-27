<?php
/**
 * Найти отсутствующий элемент в массиве
 *
 * Задача: дан массив arr, в ктр в случайном порядке находятся натуральные числа от 1 до N.
 * Каждое число встречается в массиве не более одного раза. Но одно (два) число заменили на 0. Найти это число.
 *
 * Идея: для одного числа, считаем сумму чисел от 1 до N, и от него отнмаем сумму массива, разница есть искомое.
 * Если два неизсвестных, то считаем сумму и произведение, из этого строим систему.
 */

const N = 10;
const ARR = [1, 6, 7, 4, 5, 2, 3, 0, 10, 0];
const COUNT_UNKNOWN =[1 => false, 2 => true];

$total_sum = 0; $fact_sum = 0;
$total_mul = 1; $fact_mul = 1;
for ($i=0; $i<N; $i++){
  $total_sum += $i+1; // Чтобы за один проход получить сумму массива и арифметической прогрессии, смещаем индекс на единицу
  $fact_sum += ARR[$i];
  $total_mul *= ($i+1);
  $fact_mul *= ARR[$i] != 0 ? ARR[$i] : 1;
}

if (COUNT_UNKNOWN[1]) echo "$total_sum - $fact_sum = " . ($total_sum - $fact_sum);
if (COUNT_UNKNOWN[2]){
  $d = ($total_sum-$fact_sum)*($total_sum-$fact_sum)-4*($total_mul / $fact_mul);
  $x1 = abs((-($total_sum-$fact_sum)+sqrt($d))/2);
  $x2 = abs((-($total_sum-$fact_sum)-sqrt($d))/2);
  echo $x1 . " : " . ($total_sum - $fact_sum - $x1);
  echo $x2 . " : " . ($total_sum - $fact_sum - $x2);
}