<?php
/*
 * Task 53. Робот
 * Задача: Бесконечная строка ширины 1 разбита на клетки размера 1х1. В одной клетке находится робот который может двигаться из одной клетки в другую.
 * Его перемещения определяются программой, каждая команда в которой – это одна из трех больших латинских букв: L, R, S. Выполняя команду L, робот перемещается на одну клетку влево, команду R – на одну клетку вправо, а S – остается в той же самой клетке.
 * Напишите программу, которая определит сколько различных клеток посетит робот.
 *
 * Входные данные: Программа для робота – строка из символов L, R, S. Программа состоит не более чем из 10000 команд.
 * Вывести количество различных клеток, которые посетит робот, выполняя свою программу.
 *
 * Пример входа: RRSRRLRR  Выход: 6
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

$str = 'RRSRRLRR';
$r = 0; $l = 0;
// считаем все перемещения робота
for ($i = 0; $i < strlen($str); $i++){
  if ($str[$i] == 'R') $r++;
  elseif ($str[$i] == 'L') $l++;
}

// разница в смещениях и есть искомое значение
echo abs($r - $l) + 1;