<?php
/*
 * Task 50. Спички
 * Задача: Какое минимальное количество спичек необходимо для того, чтобы выложить на плоскости N квадратов со стороной в одну спичку?
 * Спички нельзя ломать и класть друг на друга. Вершинами квадратов должны быть точки, где сходятся концы спичек, а сторонами – сами спички.
 *
 * Напишите программу, которая по количеству квадратов N, которое необходимо составить, находит минимальное необходимое для этого количество спичек.
 * Входные данные: Натуральное число N (N <= 1000)
 * Вывод: вывести минимальное кол-во спичек, требуемых для составления N квадратов.
 *
 * Например: для 4х квадратов достаточно 12 спичек, а для 14 квадратов потребуется 36 спичек
 *
 * Идея: совершенно очевидно, чем кучнее стоят, тем меньше нужно спичек. Максимальная плотность это квадрат.
 * Однако идеальный квадрат не всегда будет получаться, тогда нужно строить прямоугольник.
 * Лигично, что не всегда будет получаться прямоугольник, значит остатки просто дорисосываем снизу
 */

const N = 14;
$w = round(sqrt(N), 0, PHP_ROUND_HALF_DOWN); // Максимальная ширина
$l = intdiv(N, $w); // Максимальная высота
$extra = N - $w * $l; // Квадратики, к. не поместились в основной прямоугольник

/*
 * Для образования прямоугольника необходимо сложить:
 * 2w - спичек сверху и снизу
 * 2l - спичек справа и слева
 * (w-1)*l + (l-1)*w - для решётки внутри прямоугольника
 */
$res = $w * ($l + 1) + $l * ($w + 1);

if ($extra > 0) $res += ($extra * 2 + 1); // Дорисовываем остатки

echo $res;