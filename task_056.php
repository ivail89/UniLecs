<?php
/*
 * Task 56_1. Частичные суммы матрицы
 * Задача: Дана числовая матрица Aij. Для всех i,j найдите частичные суммы: sum(i,j) = SUM(a(k,t)), где k<=i,t<=j
 * Например,
1 2 3 4 5
5 4 3 2 1
2 3 1 5 4
 * , выход
1 3 6 10 15
6 12 18 24 30
8 17 24 35 45
 *
 * Идея: когда прикидывал на листке обратил внимание, что к предыдущему в строке прибавлял сумму столбца, аналогично и буду делать
 */

header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
$arr = [
  [1, 2, 3, 4, 5],
  [5, 4, 3, 2, 1],
  [2, 3, 1, 5, 4]
];

$resArr = [];

for ($i = 0; $i < count($arr); $i++){
  for ($j = 0; $j < count($arr[$i]); $j++){
    if ($i == 0 && $j == 0) {
      $resArr[$i][$j] = $arr[$i][$j];
      continue;
    } elseif ($i == 0){
      $sumLine = 0;
      for ($k=0; $k < $j+1; $k++) $sumLine += $arr[$i][$k];
      $resArr[$i][$j] = $sumLine;
      continue;
    } else{
      $sumColumn = 0;
      for ($m = 0; $m < $i+1; $m++) $sumColumn += $arr[$m][$j];
      $resArr[$i][$j] = $sumColumn;
      if ($j > 0) $resArr[$i][$j] += $resArr[$i][$j-1];
    }
  }
}

// Техническая функция, для вывода матрица, в привычном для человека виде
function printMatrix($arr){
  foreach ($arr as $line){
    foreach ($line as $item){
      echo $item . ' ';
    }
    echo PHP_EOL;
  }
}
printMatrix($resArr);