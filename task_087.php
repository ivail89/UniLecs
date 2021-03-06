<?php
/*
 * Задача: дети на уроке физкультуры стоят в шеренге. Необходимо посчитать кол-во способов,
 * ктр можно выбрать несколько человек так, чтобы среди них не было стоящих в шеренге рядом.
 *
 * Входные данные: N - кол-во детей в шернге.
 * Вывод: кол-во способов.
 *
 * Идея: использовать динамическое программирование, когда мы рассмоатриваем n учеников, то это f(n).
 * В зависимости от того остался стоять n-ый или вышел меняется варианты f(n-1) и f(n-2)
 * f(n) = f(n-1) + f(n-2) +1
 */
require_once ('functions.php');
function task87($n){
  $f[1] = 1;
  $f[2] = 2;
  $f[3] = 4;
  for ($i = 4; $i < $n + 1; $i++) {
    $f[$i] = $f[$i-1] + $f[$i-2] + 1;
  }
  return $f[$n];
}

for ($i = 1; $i < 11; $i++) {
  echo $i . ' => ' . task87($i) . PHP_EOL;
}