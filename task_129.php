<?php
/*
 * Анонс #129. Побитовая арифметика
 * Задача: даны два числа K, N. Необходимо вычислить арифметическое выражение вида:
 * K * 2^N, используя только битовые операции.
 * Входные данные: K, N - натуральные числа, где K от 1 до 10^3, N от 1 до 20
 * Вывод: результат выражения K * 2^N
 */

list ($k, $n) = [3 ,4];

echo $k << $n;