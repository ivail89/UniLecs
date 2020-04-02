<?php
/*
 * Так как при решение задач, часто нужно при прибегать к использованию технических функций
 * Тут собиру всё необходимое, чтобы в будущем их использовать
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

// Техническая функция, для вывода матрица, в привычном для человека виде
function printMatrix($arr){
  if (!is_array($arr)) return;
  foreach ($arr as $line){
    if (!is_array($line)) break;
    foreach ($line as $item){
      echo $item . ' ';
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

//echo distanceBetweenPoints(0, 0, 10, 10);
//$r = combinationsM_N(4, 3);
//printMatrix($r);

