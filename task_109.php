<?php
/*
 * Задача 109: Медиана и среднее арифметическое
 *
 * Даны два целых числа a, b. Необходимо найти наименьшее возможное целое число c, такое, что среднее арифметическое и медиана для a, b, c были одинаковы.
 * Медиана для трех чисел - среднее число для случая, когда числа отсортированы по убыванию.
 *
 * Входные данные: a, b - целые числа от 1 до 10^6, а также a меньше b.
 * Вывод: c - наименьшее возможное целое число, что среднее и медиана для a, b, c одинаковы.
 *
 * Пример: a = 1, b = 2 Answer: c = 0
 *
 * Идея: т.к. a < b по условию, то возможны варианты расстановки [(a,b,c), (c,a,b,), (a,c,b)]
 * но так как нужно найти минимально с, то наш случай второй или a = (c+a+b)/3
 * после преобразований получаем c = 2a - b
 */