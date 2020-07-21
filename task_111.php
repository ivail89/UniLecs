<?php
/*
 * UniLecs #111. Финал
 * Задача: в ваш город на финал футбольного кубка приехало N болельщиков ФК Реал Мадрид и M болельщиков ФК Барселона.
 * В вашем городе всего 1 отель, и номера в нем только по K мест каждый.
 * Необходимо определить кол-во номеров, ктр нужны для размещения всех болельщиков,
 * разумеется, крайне нежелательно селить в один номер болельщиков разных клубов.
 *
 * Входные данные: N, M, K - натуральные числа от 1 до 10000
 * Вывод: кол-во требуемых номеров в отеле для размещения всех болельщиков
 * Условие: использовать переменные только целого типа, запрещается использовать функции округления из коробки языка
 * Пример:
 * N = 7, M = 12, K = 3 Answer = 7
 */

require_once 'functions.php';
list($n, $m, $k) = [7, 12, 3];

echo (ceil($n / $k) + ceil($m / $k));