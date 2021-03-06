<?php
/*
 * Task 45. Положить плитку
 * Задача: Коридор NxM метров нужно застелить N плитками 1xM метров, чтобы не было не застеленной поверхности.
 * Нужно написать функцию, ктр найдет кол-во способов это сделать.
 *
 * Например, для коридора 6x4 метра существует 4-е способа застелить плитками 1x4 (см.схематический рисунок).
 * https://telegra.ph/file/9ad9127e09b6818ecb38d.png
 *
 * Идея: тут возможны три варианта:
 * 1. N < M и тогда всегда один вариант горизотнально
 * 2. N = M тут два варианта либо все горизонтально, либо все вертикально
 * 3. N > M смещаем вертикальную плитку от верхнего края и получаем два блока: j * M и N-j-M,
 *   где j - это смещение от верхнего края
 *   в данном случае нужно получить все варианты этих двух случаев
 *
 * Значит нужно получить все варианты от 1 до N и на базе них получить значение
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
const N=6, M=4; // Размер коридора
$dictionary = array(); // Таблица соответствий

for ($i = 0; $i < N+1; $i++){ // Заполняем таблицу
  if ($i < M-1) $dictionary[$i] = 1; // Первый случай
  if ($i == M) $dictionary[$i] = 2; // Второй случай
  if ($i > M){ // Третий
    $count = $i - M + 1; // так как в цикле <, то тут нужно один накинуть
    $sum = 0;
    for ($j = 0; $j < $count; $j++){ // Сдвигаем сверху вниз
      $sum += $dictionary[$j] * $dictionary[$i - M -$j]; // Перемножаем варианты двух блоков
    }
    $dictionary[$i] = $sum + 1; // Нужно не забывать добавить варианты когда все горизонтальные
  }
}

print_r($dictionary);