<?php
/*
 * Task 55. Квадраты
 * Задача: задан массив натуральных чисел, каждое значение это длина отрезка.
 * Необходимо выяснить какое наибольшее кол-во квадратов можно из них составить.
 * Сторона квадрата должна состоять только из одного отрезка.
 *
 * Например [ 7, 7, 2, 7, 8, 7, 9, 7, 2 ]  Вывод: 1
 *
 * Нужно сгруппировать отрезки по длине и посчитать и сколько из каждой группы можно сделать квадратов
 */

$input = [7, 7, 2, 7, 8, 7, 9, 7, 2];
$vocab = array();
// Формируем словарь [длина отрезка : колличество таких отрезков]
foreach ($input as $i){
  $vocab[$i]++;
}
// Сколько можно составить квадратов из каждой группы отрезков
foreach ($vocab as $k => $v){
  $vocab[$k] = floor($v / 4); // Округляем в меньшую сторону, так как нас интересуют только полные квадраты
}
echo max($vocab);