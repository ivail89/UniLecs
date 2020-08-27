<?php
/*
 * UniLecs #126. Строковые комбинации
 * Задача: вы работаете со строками, у вас есть след.символы: '1', '2', '3'.
 * Необходимо определить кол-во всевозможных строк длины N, ктр состоят только из этих символов, но при этом не содержат подстроку "12".
 *
 * Входные данные: N - длина строки от 1 до 30.
 * Вывод: кол-во всевозможных комбинаций строк
 * Пример: N = 3
 * Answer = 21
 *
 * Идея: если бы не было ограничение на использования подстроки, то было бы 3*f(n-1) - комбинаций, а так нужно отнять f(n-2) чтобы убрать все случаи подстроки 12.
 * f(n-2) - нашел выписав варианты для нескольких случаев и увидел зависимость
 */
require_once 'functions.php';
$n = 5;
$f = [
  1 => 3,
  2 => 8
];

for ($i = 3; $i < $n; $i++) {
  $f[$i] = 3*$f[$i-1] - $f[$i-2];
}

$f[$n] = 3*$f[$n-1] - $f[$n-2];
echo $f[$n];