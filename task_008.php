<?php
/**
 * Дан целочиселнный массив. Вывести максимальную сумму элементов. Суммировать элементы можно только последоватеьно
 */

function maxSum($arr){
  $max = $arr[0] + $arr[1];
  for ($i = 1; $i < count($arr)-1; $i++){
    if ($max < $arr[$i]+$arr[$i+1]){
      $max = $arr[$i]+$arr[$i+1];
    }
  }
  return "$max <br/>";
}

$arr1 = array(1, 2, 3, 5, 1, -1, 0);
$arr2 = array(1, 1, 1, 1, 1, 1, 1);
$arr3 = array(-1, -2, -3, -5, -1, -1, 0);

echo maxSum($arr1).maxSum($arr2).maxSum($arr3);