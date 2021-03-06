<?php
/*
 * Задача 115: Чемпионат
 * В ваш город на футбольный чемпионат приехали болельщики N команд. В вашем городе всего 1 отель, и номера в нем только по K мест каждый.
 * Необходимо определить кол-во номеров, ктр нужны для размещения всех болельщиков, разумеется, крайне нежелательно селить в один номер болельщиков разных команд.
 *
 * Входные данные: fans = { f1, f2, ..., fN } - массив, где fi - кол-во болельщиков команды i.
 *    N - кол-ва команд на чемпионате, где N от 1 до 1000. K - вместимость номеров отеля.
 * Вывод: кол-во требуемых номеров в отеле для размещения всех болельщиков
 *
 * Условие: использовать переменные только целого типа, запрещается использовать функции округления из коробки языка
 * Пример: K = 3, fans = { 7, 12, 5 }
 * Answer = 9
 */

$arr = [7, 12, 5];
$k = 3;

$rooms = 0;
foreach ($arr as $a) {
  if ($a % $k != 0) {
    $rooms += intdiv($a, $k) + 1;
  } else {
    $rooms += intdiv($a, $k);
  }
}

echo $rooms;