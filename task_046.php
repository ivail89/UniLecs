<?php
/*
 * Task 46. Разворот числа
 * Задача: дано натуральное число N.
 * Напишите функцию для реверса этого числа. Функция должна вернуть число, нельзя выводить результат по одной цифре.
 *
 * Условие: Нельзя использовать циклы, преобразование в строки, списки/массивы.
 *
 * Решение: используем рекурсию
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
const N = 123456789;

function reverseNumber($n, $revN = 0){
  if ($n < 10){ // При необходимости вначе можно добавить проверку отрицательное число или нет менять знак числа
    return $revN*10 + $n; //
  } else {
    $revN = $revN * 10 + ($n % 10);
    $n = intdiv($n, 10);
    return reverseNumber($n, $revN);
  }
}

echo reverseNumber(N);
