<?php
/*
 * Анонс #147. Duplicates
 * Задача: Дан массив целых чисел - arr[]. Необходимо выяснить, есть ли такие два различных индекса i, j в массиве,
 * что arr[i] == arr[j] и абсолютная разность между ними не более K ( |i - j| <= k).
 *
 * Входные данные: arr - массив целых чисел от 1 до 10^3 элементов, элементы массива целые числа от 1 до 10^3 по модулю;
 * K - натуральное число от 1 до 10^3
 *
 * Вывод: true - если в массиве найдутся такие два индекса, удовлетворяющих условиям, в противном случае false.
 *
 * Пример:
 * 1. arr = [1, 2, 3, 1]; K = 3 Answer = true
 * 2. arr = [1, 0, 1, 1]; K = 1 Answer = true
 * 3. arr = [1, 2, 3, 1, 2, 3]; K = 2 Answer = false
 *
 * Идея: строим матрицу вхождений каждого элемента и его индексы
 */
require_once 'functions.php';

function task_147(array $arr, int $k)
{
  $matrix = array();
  foreach ($arr as $i => $v) { // Перебираем все элементы, для оценки вхождения каждого и сохранения его индекса
    if (array_key_exists($v, $matrix)) { // Ранее уже встречали этот элемент
      foreach ($matrix[$v] as $index) { // Перебираем все случаи, когда встречали этот элемент
        if (abs($i - $index) == $k) { // Проверяем не нашли ли необходимый случай (расстояние равно индексам)
          return "Exist $i - $index"; // Так как нам не нужно найти все случаи завершаем выполнение
        } else {
          array_unshift($matrix[$v], $i); // В существующих не был найден случай с дистанцией равной K, сохраняем индекс для будущих случаев
        }
      }
    } else {
      $matrix[$v] = [$i]; // Индекс первый раз встретили создаем подмассив
    }
  }
  return "Isn't exist";
}

echo task_147([1, 2, 3, 1], 3) . PHP_EOL;
echo task_147([1, 0, 1, 1], 1) . PHP_EOL;
echo task_147([1, 2, 3, 1, 2, 3], 2) . PHP_EOL;