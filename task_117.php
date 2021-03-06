<?php
/*
 * UniLecs #117. Снова степень
 *
 * Задача: дано число k^k. Необходимо определить 1ю цифру этого числа.
 * Входные данные: k - натуральное число от 1 до 10^4.
 * Вывод: 1я цифра числа k^k
 *
 * Пример: k = 3 Answer: 2 (3^3 = 27)
 *
 * см. разбор https://telegra.ph/UniLecs-117-Snova-stepen-08-13
 */

$k = 3;
$count = floor($k * log10($k)) + 1;
$t = 10**($k*log10($k)+1-$count);

printf('%d', $t);