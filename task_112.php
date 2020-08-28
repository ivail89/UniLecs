<?php
/*
 * UniLecs #112. Совещание
 *
 * Задача: начинается совещание за круглым столом. Собралось N человек.
 * Как им одновременно пожать руки друг другу так, чтобы руки никаких людей не пересекались.
 * Вам необходимо вычислить кол-во вариантов, ктр они могут это сделать. Порядок расположения за столом люди не меняют.
 *
 * Входные данные: N - четное натуральное число от 2 до 100.
 * Вывод: кол-во способов, ктр они могут пожать друг другу руки.
 * Пример:  N = 4 Answer = 2
 *
 * Идея: в данном случае это классическая задача с числами Каталана.
 * https://habr.com/ru/post/165295/
 *
 * Важное замечение: на пример 4х участников, не нужно стремится придумать, чтобы каждый участник пожал руку друг другу
 * Т.е. если 1ый и 4ый всегда будут иметь пересечение, значит игнорируем этот вариант
 */

require_once 'functions.php';

$n = 6;
$nn = intdiv($n, 2); // Так при работе с числами Каталана используют 2n вершин
$res = intdiv( factorial($n), (factorial($nn) * factorial($nn + 1)) ); // см. формулу по ссылке выше

echo $res;