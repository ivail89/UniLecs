<?php
/*
 * Task 59. Заказы
 * Задача: Фирма получила некоторые проекты и разбила их на меньшие независимые заказы с разными стоимостями.
 * Предполагается, что все заказы могут быть выполнены за одну единицу времени.
 * Фирма, имея ограниченное время, должна выяснить, сколько в наилучшем случае, она сможет заработать, принимая более ценные заказы и отклоняя другие.
 *
 * Дано время t, ктр имеется в распоряжении фирмы и массив, ктр содержит значения стоимости заказов.
 * Напишите функцию, ктр выведет максимальную заработанную сумму денег, ктр можно получить в пределах доступного времени.
 *
 * Например,
 * 1. t = 3, Arr = [1, 1, 1, 1, 1]; Вывод: 3
 * 2. t = 4, Arr = [11, 2]; Вывод: 13
 * 3. t = 4, Arr = [8, 2, 9, 17, 4, 4, 10]; Вывод: 44
 *
 * Решение:
 * Сортируем в обратном порядке и собираем значения
 */

include_once ('functions.php');
list ($t, $prices) = [3, [1, 1, 1, 1, 1]];
//list ($t, $prices) = [4, [11, 2]];
//list ($t, $prices) = [4, [8, 2, 9, 17, 4, 4, 10]];

$couunt_prices = count($prices);
$profit = 0;
if ($t > $couunt_prices){
  foreach ($prices as $price) $profit += $price;
}
else{
  rsort($prices);
  foreach ($prices as $price){
    $profit += $price;
    if ($t-- == 1) break;
  }
}

echo $profit;
