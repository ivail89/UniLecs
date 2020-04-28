<?php
/*
 * Так как при решение задач, часто нужно при прибегать к использованию технических функций
 * Тут собиру всё необходимое, чтобы в будущем их использовать
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

/*
 * Техническая функция, для вывода матрица, в привычном для человека виде
 * $showIdx - выводим значения индексов
 */
function printMatrix($arr, $showIdx = false){
  if (!is_array($arr)) return;
  foreach ($arr as $y => $line){
    if (!is_array($line)) break;
    foreach ($line as $x => $item){
      echo $showIdx ? "($x,$y) " : $item . ' ';
    }
    echo PHP_EOL;
  }
}

// Получить все кобинации (сочетания) из множества N по M в каждом наборе
function combinationsN_M($n, $m){
  $arr = [];
  for ($i = 0; $i < $m; $i++) {
    $arr[$i] = $i + 1;
  }
  $res[] = $arr;
  while (1){
    $k = $m;
    $isFinal = true;
    for ($i = $k - 1; $i >= 0; $i--){
      if ($arr[$i] < $n - $k + $i + 1){
        $arr[$i]++;
        for ($j = $i + 1; $j < $k; $j++)
          $arr[$j] = $arr[$j - 1] + 1;
        $res[] = $arr;
        $isFinal = false;
      }
      if ($isFinal) return $res;
    }
  }
}

// Расстояние между двумя точками. Длина отрезка
function distanceBetweenPoints($x1, $y1, $x2, $y2){
  return sqrt(($x2 - $x1)**2 + ($y2 - $y1)**2);
}

// Поиск наибольшего общего делителя (НОД) двух чисел, в остнове лежит алгоритм Евклида
// https://ru.wikipedia.org/wiki/%D0%90%D0%BB%D0%B3%D0%BE%D1%80%D0%B8%D1%82%D0%BC_%D0%95%D0%B2%D0%BA%D0%BB%D0%B8%D0%B4%D0%B0
function gcd($a, $b){
  // Меняем значения местами, чтобы не получить ошибку в будущем
  if ($b > $a) list ($a, $b) = [$b, $a];
  $r = $a % $b; // Вычисляем до цикла, может быть b есть делитель для а
  while ($r > 0){
    $a = $b;
    $b = $r;
    $r = $a % $b;
  }
  return $b;
}

// Вычисление наименьшего общего кратного (НОД)
//https://ru.wikipedia.org/wiki/%D0%9D%D0%B0%D0%B8%D0%BC%D0%B5%D0%BD%D1%8C%D1%88%D0%B5%D0%B5_%D0%BE%D0%B1%D1%89%D0%B5%D0%B5_%D0%BA%D1%80%D0%B0%D1%82%D0%BD%D0%BE%D0%B5
function lcm($a, $b){
  return abs($a*$b) / gcd($a, $b);
}

// Поиск левой нижней и правой верхней координаты матрицы по координатам точек
function findEdgesPoint($arr){
  list ($minX, $minY) = $arr[0];
  list ($maxX, $maxY) = $arr[0];
  foreach ($arr as $line) {
    if ($line[0] < $minX) $minX = $line[0];
    if ($line[1] < $minY) $minY = $line[1];
    if ($line[0] > $maxX) $maxX = $line[0];
    if ($line[1] > $maxY) $maxY = $line[1];
  }
  return [$minX, $minY, $maxX, $maxY];
}

// Получить все варинты чисел для n битов
function setsOfBits($n){
  if ($n == 1) {
    return ['0', '1'];
  }
  $arr = setsOfBits($n - 1);
  $res = [];
  foreach ($arr as $a) {
    $res [] = $a . '0';
    $res [] = $a . '1';
  }
  return $res;
}

$arr = setsOfBits(7);
$n = 1;
foreach ($arr as $a) {
  if (strpos($a, '111') !== false) continue;
  echo $n . ': ' . $a . PHP_EOL;
  $n++;
}
//echo distanceBetweenPoints(0, 0, 10, 10);
//$r = combinationsM_N(4, 3);
//printMatrix($r);
//echo lcm(1071, 71);
