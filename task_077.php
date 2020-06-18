<?php
/*
 * Task 77. Площадь четырехугольника
 * Задача: даны стороны выпуклого четырехугольника: a, b, c, d и диагональ f
 * Необходимо определить площадь четырехугольника.
 * Входные данные: a, b, c, d - стороны четырехугольника и f - диагональ, где 0 < a,b,c,d,f < 10000
 * Вывод: вывести площадь четырехугольника.
 *
 * Идея: я буду использовать формулу: https://2mb.ru/matematika/geometriya/ploshhad-chetyrexugolnika/
 * тут диагональ не нужна
 */

list($a, $b, $c, $d) = [3, 4, 4, 2];
$p = ($a + $b + $c + $d) / 2;

$s = sqrt(($p-$a)*($p-$b)*($p-$c)*($p-$d));
echo $s;