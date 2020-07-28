<?php
/*
 * UniLecs #116. Вагонетка
 *
 * Задача: В одной области одной северной страны, где нет нормальных дорог,
 * чтобы добраться из одного поселка до другого люди вынуждены пользоваться самодельной вагонеткой для доставки грузов.
 * В этой области N поселков и только нектр из них соединены между собой старой железной дорогой.
 * Для проезда по ней из одного поселка до другого нужна одна канистра горючего, но в каждом поселке своя стоимость канистры горючего.
 * А вагонетка слишком мала, и вы не можете взять с собой доп.канистры.
 * Необходимо довести груз из 1го поселка до N-го, при этом использовать минимальное кол-во средств на горючку.
 *
 * Входные данные: OilCosts = [oilCost_1, oilCost_2, ... oilCost_N] - массив, где oilCost(i) - стоимость канистры горючего в i-м поселке.
 * TrainRoads = [ (Ai, Bj) ] - массив, где (Ai, Bj) - железная дорога, ктр соединяет поселок Ai c поселком Bj.
 * Дороги двухсторонние, и разумеется, между любыми двумя поселками не более 1 одной дороги.
 * Вывод: вывести оптимальный маршрут, т.е. номера поселков на этом маршруте.
 *
 * Пример:
 * OilCosts = [5, 10, 1] TrainRoads = [ (1, 3), (1, 2), (3, 2) ]
 * Answer: 1 -> 3
 *
 * Идея: реализуем алгоритм Дейкстры
 */
require_once 'functions.php';

$oilCosts = [5, 10, 1];
$n = count($oilCosts);
$trailRoads = [[0, 2], [0, 1], [2, 1]];

$matrix = array_fill(0, $n, array_fill(0, $n, 0)); // Переведем исходные данные к табличному представлению графа
foreach ($trailRoads as $key => $road) {
  $matrix[$road[0]][$road[1]] = $oilCosts[$key];
//  $matrix[$road[1]][$road[0]] = $oilCosts[$key]; // Так как можно двигаться в оба направления
}
$coast_map = array_fill(1, $n, PHP_INT_MAX); // исходные веса
array_unshift($coast_map, 0); // В изночальной точке затрат не требуется
$way = [0]; // итоговый маршрут
$current = 0;

while (true) {
  $next = -1; // следующая вершина для визита
  for ($i = 0; $i < $n; $i++) {
    if (
      $matrix[$current][$i] > 0 && // текущая вершина связаной с i-ой
      $current != $i && // не показывает сама на себя
      $matrix[$current][$i] + $coast_map[$current] < $coast_map[$i] && // переход в эту вершу меньше, чем был до этого
      !in_array($i, $way) // с этой вершиной еще не работали
    ){
      $coast_map[$i] = $matrix[$current][$i] + $coast_map[$current]; // обновляем вес
      if ($next == -1) { // следующая еще не определена
        $next = $i;
      } elseif ($coast_map[$next] > $coast_map[$i]) { // найдена более легкая следующая
        $next = $i;
      }
    }
  }
  if ($next == -1) break; // остались в текущей точке
  $current = $next;
  $way [] = $next;
  if ($next == $n -1) break; // пришли в финальную точку
  if (count($way) == $n) break; // прошли все точки
}
print_r($way);
