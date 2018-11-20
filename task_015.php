<?php
/**
 * Определить максимальный объем воды, который можно набрать внутри неё
 */

function maxV($arr){
  $i1 = array_keys($arr, max($arr))[0];
  $i2 = 0;
  for ($i=1; $i < count($arr); $i++){
    if (($arr[$i] > $arr[$i2]) && ($i !== $i1) && (abs($i - $i1) > 1)){
      $i2 = $i;
    }
  }
  if ($i1 > $i2){
    $i1 -= $i2 = ($i1 += $i2) - $i2;
  }

  $res = 0;
  $min = ($arr[$i1] < $arr[$i2]) ? $arr[$i1]:$arr[$i2];
  for ($i=$i1+1; $i < $i2; $i++){
    $res += ($min - $arr[$i]);
  }
  echo $res;
}

maxV([3, 6, 2, 4, 2, 3, 2, 10, 10, 4]);

