<?php
/**
 * Дан массив натуральных чисел. Каждое число представлено два раза и одно один, нужно найти непарнвй элемент.
 */

$arr = array(0, 4, -1, 5, -1, 4, 0);

function findExtraEl($arr){
  $el = array_shift($arr);
  foreach ($arr as $next_el){
    $el = $el ^ $next_el;
  }

  return $el;
}

echo findExtraEl($arr);