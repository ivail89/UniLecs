<?php
/*
 * Task 43. Коробки
 * Задача (условие задачи с сайта acmp.ru): На столе лежат коробка размера A1 × B1 × C1 и коробка размера A2 × B2 × C2.
 * Выясните можно ли одну из этих коробок положить в другую, если разрешены повороты коробок вокруг любого ребра на угол 90 градусов.
 *
 * Идея: информация про 90 градусов дана больше для отвлечения внимания. Чтобы одна коробка поместилась в другую нужно,
 *  чтобы все три стороны одной былм меньше другой. Случай когда они равны будем считать, что поместить нельзя.
 */

header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

/*
 * $sizes - массив из трез элементов, размеры одной коромбки
 */
function boxIntoBox($sizes1, $sizes2){
  // Отсортируем размеры, чтобы сравнивать меньшее с меньшим
  sort($sizes1);
  sort($sizes2);

  if (($sizes1[0] > $sizes2[0] && $sizes1[1] > $sizes2[1] && $sizes1[2] > $sizes2[2])
    || ($sizes1[0] < $sizes2[0] && $sizes1[1] < $sizes2[1] && $sizes1[2] < $sizes2[2])) return 'One box is able put into other';
  else return 'One box isnt able put into other';
}

echo boxIntoBox([1, 2, 3],[3, 2, 1]) . PHP_EOL;
echo boxIntoBox([2, 2, 3],[3, 2, 1]) . PHP_EOL;
echo boxIntoBox([2, 2, 3],[3, 2, 3]) . PHP_EOL;
echo boxIntoBox([6, 4, 5],[1, 2, 3]) . PHP_EOL;