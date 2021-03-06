<?php
/*
 * #182. Комбайн
 * Задача: комбайну необходимо собрать урожай с прямоугольного поля размера N*M метров (N - длина, M - ширина).
 * Ширина комбайна - 1 метр. Комбайну нужно собрать урожай со всего поля.
 * Он начинает движение с верхнего левого угла в горизонтальном направлении до конца поля, затем он поворачивает направо
 * и далее движется аналогичным образом. Так он продолжает свое движение по спирали до тех пор, пока весь урожай с поля не будет собран.
 *
 * Определите количество поворотов комбайна, которые необходимо совершить в процессе работы?
 * Входные данные: N, M - натуральные числа от 1 до 10^9.
 * Вывод: количество поворотов
 *
 * Идея: сделав несколько рисунков можно увидеть зависимость:
 * N <= M ? N + N - 2 : M + M - 1
 */

