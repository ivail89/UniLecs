<?php
/*
 * Анонс #143. Пирамида - 2
 *
 * Задача: снова строим пирамиду, на этот раз порядок следующий: нужно укладывать блоки по спирали против часовой стрелки,
 * начиная с левого нижнего угла. Верхний ярус пирамиды состоит из 1 го блока, каждый след.ярус на 2 блока больше предыдущего.
 *
 * Необходимо написать программу, ктр формирует схему укладки блоков.
 * Входные данные: height - высота пирамиды, ктр необходимо построить, где height - натуральное число от 1 до 100.
 *
 * Пример: height = 3
 * 7
 * 8 9 6
 * 1 2 3 4 5
 */
require_once 'functions.php';

$n = 7;
$basis = 2 * $n - 1; // В основании ширина матрицы
$count = $n**2 + 1; // Внутри пирамиды должны быть числа от 1 до n^2
// Базовая подготовка перед началом заполнения
$arr = array_fill(0, $n, array_fill(0, $basis, '*'));
$i = 1;
$x = 0;
$y = $n-1;
$direction = 'leftToRight';
// Идея: будем на каждом шагу проверять, куда можно ходить. Продолжаем в том же направлении, меняем направление
while ($i < $count) {
  $arr[$y][$x] = $i;
  $i++;
  switch ($direction) {
    case 'leftToRight':
      if ($arr[$y][$x + 1] == '*') { // продолжаем
        $x++;
      } else { // меняем направление
        $direction = 'downToUp';
        $x--;
        $y--;
      }
      break;
    case 'downToUp':
      // При движении снизу вверх можно выйти за границы треугольника если N нечетное
      // Для этого будем всегда проверять что мы под линией y = x
      $d = positionPoint(0, $n-1, $n-1, 0, $x-1, $y-1);
      if ($arr[$y - 1][$x - 1] == '*' && $d < 1) { // продолжаем
        $x--;
        $y--;
      } else { // меняем направление
        $direction = 'upToDown';
        $x--;
        $y++;
      }
      break;
    case 'upToDown':
      if ($arr[$y + 1][$x - 1] == '*') { // продолжаем
        $x--;
        $y++;
      } else { // меняем направление
        $direction = 'leftToRight';
        $x++;
      }
      break;
  }
}
printMatrix($arr);