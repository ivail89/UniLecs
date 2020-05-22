<?php
/*
 * Задача 86: Семь раз отмерь, один раз отрежь
 * На даче нужно поменять обшивку крыши. У вас есть прямоугольный металлический лист. Вам нужно сделать 3 одинаковых квадратных листа металла.
 * Из основного куска можно вырезать квадраты, стороны ктр должны быть параллельны сторонам листа.
 * Необходимо определить максимально возможный размер квадратов, ктр можно вырезать из исходного листа металла.
 *
 * Входные данные: width, height - ширина и высота куска металла.
 * Вывод: наибольшая длина стороны квадратов.
 *
 * Пример: 1. width = 210; v = 297 Answer = 105   |    2. width = 250; v = 100   Answer = 83.33
 */

list($w, $h) = [210, 297]; // 105
list($w, $h) = [250, 100]; // 83.33

if ($h > $w) list($w, $h) = [$h, $w];

echo max($h / 2,
  ($w / 3) < $h ? $w / 3 : 0,
  ($w / 3) >= $h ? $h : 0);