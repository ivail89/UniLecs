<?php
/**
 * В заданном массиве есть два числа перемножив которые получим заданное число Х
 */

function multiplyX($arr, $x){
  $count = count($arr);
  for ($i = 0; $i < $count-1; $i++){
    for ($j = $i + 1; $j < $count; $j++){
      if ($arr[$i]*$arr[$j] == $x) return "$arr[$i] * $arr[$j] = $x <br/>";
    }
  }
  return "False <br/>";
}

echo multiplyX([-1, 0, 0, 3, 3, 10], -10);
echo multiplyX([0, 3, 3, 10], 3);
echo multiplyX([1, 0, 3, 3, 9, 15], 10);
echo multiplyX([1, 0, 3, 3, 20, 8], 10);
echo multiplyX([1, 0, -3, 3, -10], -9);
