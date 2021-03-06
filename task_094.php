<?php
/*
 *  Задача 94: Пирог
 *
 * Был приготовлен большой пирог на семейный праздник.
 * К вам придут гости и всего будет N человек, но возможно, к вам заедут еще и старые друзья и тогда всего будет M человек.
 *
 * На какое минимальное кол-во частей вам необходимо разрезать пирог (не обязательно всех равных), чтобы при любом кол-ве гостей, все сьели пирог поровну?
 * Входные данные: N, M, где N,M меньше 10000
 * Вывод: минимальное кол-во кусочков пирога
 * Пример: N = 2, M = 3 Answer: 4
 *
 * Тут важно отметить, что куски могут остаться.
 */
require_once 'functions.php';

list ($n, $m) = [2, 3];
$k = $n + $m - gcd($n, $m);
echo $k;