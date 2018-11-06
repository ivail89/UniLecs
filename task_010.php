<?php
/**
 * Данна целочисленная матрица. Если элемент равен 0, то заполняем нулями строку и столбец
 */

function zeroMatrix($arr)
{
  $arrI = array();
  $arrJ = array();
  // Сначала необходимо узнать все нулевые позиции, потом заполнять нулями.
  for ($i = 0; $i < count($arr); $i++) {
    for ($j = 0; $j < count($arr[$i]); $j++) {
      if ($arr[$i][$j] == 0) {
        array_push($arrI, $i);
        array_push($arrJ, $j);
      }
    }
  }
  foreach ($arrI as $i) {
    $j = array_shift($arrJ);
    for ($k = 0; $k < count($arr); $k++) {
      $arr[$k][$j] = 0;
    }
    for ($k = 0; $k < count($arr[$i]); $k++) {
      $arr[$i][$k] = 0;
    }
  }
  foreach ($arr as $string){
    foreach ($string as $value){
      echo "$value \t";
    }
    echo "<br/>";
  }
}



$arr = array([1, 0, 1, 1],
             [1, 1, 1, 1],
             [1, 1, 1, 0],
             [1, 1, 1, 1]
            );

zeroMatrix($arr);