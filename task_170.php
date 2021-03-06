<?php
/*
UniLecs #170. Сортировка подсчетом
Задача: дан массив целых чисел из заданного диапазона [min, max]. 
Необходимо оптимальным способом отсортировать массив по возрастанию.

Входные данные: [min, max] - диапазон целых чисел, arr - массив целых чисел из заданного диапазона. 
min, max - не превышают 1000 по модулю. Размер массив от 1 до 10^6.

Вывод: отсортированный по возрастанию массив
*/

$min_max = [1, 10];
$arr =  [ 4, 5, 2, 2, 8, 9, 8, 2, 1, 4, 1, 4, 9 ];

$tmp = array_fill ($min_max[0], $min_max[1]-$min_max[0]+1, []);
foreach ($arr as $a){
    $tmp[$a] [] = $a;
}
$result = array();
foreach ($tmp as $t){
    $result = array_merge($result, $t);
}
print_r($result);
