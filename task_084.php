<?php
/*
 * Task 84. Анаграммы
 * Задача: анаграммой слова называется любая перестановка всех букв слова.
 * Например, из слова СОЛО можно получить 12 анаграмм: СОЛО, ЛОСО, ОСЛО, ОЛСО, ОСОЛ, ОЛОС, СЛОО, ЛСОО, ООЛС, ООСЛ, ЛООС, СООЛ.
 * Необходимо написать функцию, ктр выведет кол-во различных анаграмм, ктр могут получиться из этого слова.
 * Входные данные: строка, кол-во символов не превышает 10.
 * Вывод: кол-во анаграмм.
 * Пример: СОЛО Вывод: 12
 *
 * Формула для перестановок с повторениями: P(n1, n2, ..., nk) = n! / (n1! * n2! * ... * nk!)
 * Так как задача не стоит в оптиимизации алгоритма, поиграю со встроенными функциями работы с массивами
 */
include_once ('functions.php');

$word = 'parabola'; // руские буквы не используем, иначе strlen не верно считает длину
$n = factorial(strlen($word)); // числитель
$denominator = 1;
$unique_letters = array_unique(str_split($word)); // какие буквы есть в слове
foreach ($unique_letters as $letter) {
  $count = substr_count($word, $letter);
  if ($count > 1) $denominator *= factorial($count);
}

echo $n / $denominator;