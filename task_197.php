<?php
/*
 * Анонс #197. Кратчайший путь двух коней
 * Задача: на шахматной доске 8×8 стоит два шахматных коня и для каждого из них задана клетка, в которую он должен попасть.
 * Переведите каждого из двух коней в заданную конечную клетку за наименьшее суммарное число ходов.
 *
 * Примечание: два коня не могут одновременно находиться в одной клетке, но могут ходить в любом порядке (не обязательно по очереди).
 *
 * Входные данные:
 * (x1, x2) - x1 - начальная позиция 1го коня, x2 - позиция, куда необходимо переместить 1го коня,
 * (y1, y2) - y1 - начальная позиция 2го коня, y2 - позиция, куда необходимо переместить 2го коня.
 *
 * Вывод: последовательность ходов коней - (номер коня, ход)
 *
 * Пример:
 * 1й конь: (a1, c2)
 * 2й конь: (c2, a1)
 *
 * Output:
 *
 * (1, b3)
 * (1, d4)
 * (2, a1)
 * (1, c2)
 */
//require_once 'functions.php';

// для простоты будем считать, что координаты всегда заданы как два числа от 1 до 8
function findShorestWay(array $a, array $b): void
{
  $field = array_fill(1, 8,
    array_fill(1, 8, [
      'cost' => PHP_INT_MAX,
      'visited' => false,
      'previous' => null
  ]));

  list($x, $y) = $a;
  $field[$x][$y]['cost'] = 0;
  $field[$x][$y]['visited'] = true;

  $queue = new SplQueue();

  for ($i = 0; $i < 65; $i++) {
// 1. назад-вверх
    if ($x - 2 > 0 && $y - 1 > 0  // в границах доски
      && !$field[$x - 2][$y - 1]['visited'] // еще не была головой
      && ($field[$x - 2][$y - 1]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, -2, -1, $queue);
    }

// 2. назад-вниз
    if ($x - 2 > 0 && $y + 1 < 9  // в границах доски
      && !$field[$x - 2][$y + 1]['visited'] // еще не была головой
      && ($field[$x - 2][$y + 1]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, -2, 1, $queue);
    }

// 3. вверх-назад
    if ($x - 1 > 0 && $y - 2 > 0  // в границах доски
      && !$field[$x - 1][$y - 2]['visited'] // еще не была головой
      && ($field[$x - 1][$y - 2]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, -1, -2, $queue);
    }

// 4. вниз-назад
    if ($x - 1 > 0 && $y + 2 < 9  // в границах доски
      && !$field[$x - 1][$y + 2]['visited'] // еще не была головой
      && ($field[$x - 1][$y + 2]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, -1, 2, $queue);
    }

// 5. вверх-вперд
    if ($x + 1 < 9 && $y - 2 > 0  // в границах доски
      && !$field[$x + 1][$y - 2]['visited'] // еще не была головой
      && ($field[$x + 1][$y - 2]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, 1, -2, $queue);
    }

// 6. вперед-вверх
    if ($x + 2 < 9 && $y - 1 > 0  // в границах доски
      && !$field[$x + 2][$y - 1]['visited'] // еще не была головой
      && ($field[$x + 2][$y - 1]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, 2, -1, $queue);
    }

// 7. вниз-вперед
    if ($x + 1 < 9 && $y + 2 < 9  // в границах доски
      && !$field[$x + 1][$y + 2]['visited'] // еще не была головой
      && ($field[$x + 1][$y + 2]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, 1, 2, $queue);
    }

// 8. вперед-вниз
    if ($x + 2 < 9 && $y + 1 < 9  // в границах доски
      && !$field[$x + 2][$y + 1]['visited'] // еще не была головой
      && ($field[$x + 2][$y + 1]['cost'] > $field[$x][$y]['cost'] + 1) // из текущей позиции сюда выгоднее попасть чем прошлый вариант
    ) {
      updateCell($field, $x, $y, 2, 1, $queue);
    }

    if ($queue->count()) { // в результате обхода нашли новые точки куда можно прийти из текущей
      $next = $queue->dequeue();
      $x = $next['x'];
      $y = $next['y'];
      $field[$x][$y]['visited'] = true;
    } else { // перебрали все варианты, можно заканчивать
      break;
    }
  }

  // для дебага выведем всю шахматную доску с указанием за сколько шагов можно добраться до каждого положения из текущей точки
  echo "<table border=\"1\">";
  foreach ($field as $yy => $row) {
    echo "<tr>";
    foreach ($row as $xx => $cell) {
      $str = "($yy;$xx) ";
      $str .= ($cell['cost'] < PHP_INT_MAX ? $cell['cost'] : ' - ');
      $str .= ($cell['visited'] ? ' t ' : ' f ');
      $str .= ($cell['previous'] !== null ? "{$cell['previous'][0]} : {$cell['previous'][1]}" : ' - ');
      echo "<th> $str </th>";
    }
    echo "</tr>";
  }
  echo "</table>";

  // получаем ответ короткий маршрут из точки А в точку Б
  list($x, $y) = $b;
  $res = "($x, $y)";
  while ($field[$x][$y]['previous'] !== null) {
    list ($x, $y) = $field[$x][$y]['previous'];
    $res .= " <- ($x, $y)";
  }
  echo $res;
}

// обновляем содержимое шахматной доски
function updateCell(array &$field, int $x, int $y, int $dx, int $dy, SplQueue $queue) : void
{
  if ($field[$x + $dx][$y + $dy]['cost'] > ($field[$x][$y]['cost'] + 1)) {
    $field[$x + $dx][$y + $dy]['cost'] = $field[$x][$y]['cost'] + 1;
    $field[$x + $dx][$y + $dy]['previous'] = [$x, $y];
    $queue->enqueue([ // сохраним новую точку чтобы в следующий раз продолжить анализ из неё
      'x' => $x + $dx,
      'y' => $y + $dy
    ]);
  }
}

findShorestWay([8, 1], [4, 5]);