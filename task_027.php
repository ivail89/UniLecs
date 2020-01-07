<?php
/*
 * Task 27. Операции вычитания, умножения и деления через операцию сложения
 * Задача: реализовать операции вычитания, умножения и деления через операцию сложения
 *
 * Идея:
 * Вычитание: a - b = a + (-1)*b
 * Умножение: a * b = a + a + ... + a повторяем b раз
 * Деление: a / b = сколько раз b может поместиться в a, поэтому будем отнимать до тех пор, пока a < b
 */

header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
// На вход b должно приходить уже отрицательным, при необходимости можно воспользоваться готовой функцией
function subtraction($a, $b){
  return $a + $b;
}

// Предполагаем, что на вход b всегда приходит положительная
function multiplication($a, $b){
  $res = 0;
  while ($b != 0){
    $res += $a;
    $b--;
  }
  return $res;
}

function division($a, $b){
  $res = 0;
  $opositeB = oposite($b);
  while ($a >= $b){
    $res++;
    $a = subtraction($a, $opositeB);
  }
  return $res;
}

// Нужно получить значение -b, для этого складываем -1 b раз
function oposite ($b){
  $opositeB = 0;
  while ($b != 0) {
    $opositeB += -1;
    $b--;
  }
  return $opositeB;
}

echo subtraction(10, oposite(2)) . "\n";
echo multiplication(10, 2) . "\n";
echo division(10, 2) . "\n";