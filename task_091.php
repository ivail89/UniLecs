<?php
/*
 * Task 91. Обработка массива
 *
 * Задача: дан массив input из N целых чисел.
 * Необходимо получить массив output, таким образом, что output[i] равно произведению всех элементов массива input[i] кроме input[i].
 *
 * Входные данные: input - массив из N целых чисел, где N меньше 10^4, значения input[i] по модулю также меньше 10^4.
 * Вывод: массив output.
 * Пример:
 * input = [1, 2, 3, 4]
 * output = [24, 12, 8, 6]
 *
 * Так как в массив м.б. 0, перемножить все значения нельзя. Будем смещать постепенно.
 * output[i] = произведение справа и слева от него
 */

$input = [1, 2, 0, 4];
$left = array_shift($input);
$right = array_product($input);
$output[] = $right;
while (count($input) > 0) {
  $el = array_shift($input);
  $right = $el===0 ? array_product($input) : $right / $el;
  $output[] =  $left * $right;
  $left *= $el;
}

print_r($output);