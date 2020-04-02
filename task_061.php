<?php
/*
 * Task 61. Дорожная служба
 * Задача: дорожным службам нужно обработать дороги антигололедным реагентом.
 * В каждом районе только одна машина, она должна ночью обьехать все дороги этого района.
 * Машина выезжает из гаража и должна туда же вернуться.
 *
 * 1. Машина может обрабатывать тольку одну проезжую полосу дороги за один проезд. Все дороги прямые и с одной полосой в каждом направлении.
 * 2. Машина может поворачивать на любом перекрестке в любую сторону, также может развернуться.
 * 3. Машина при обработке едет со скоростью 20 км/час, в обычном режиме - 50 км/час.'
 * 4. Возможность проехать все дороги всегда существует.
 * 5. Необходимо выяснить какое минимальное время нужно машине, чтобы обработать все проезжие полосы всех дорог в своем раойне и вернуться обратно в гараж.
 *
 * Входные данные:
 * Даны координаты гаража (начальной точки) - x, y.
 * Массив, каждый элемент ктр это координаты начала и конца дороги.
 * Напишите функцию, ктр вернет значение минимального времени (в минутах, округлите до целого), необходимое для обработки всех дорог и возврата обратно.

Пример:
x = 0, y = 0,
Arr = [
 { start: { x = 0, y = 0 }, end: { x = 10000, y = 10000 }},
 { start: { x = 5000, y = -10000 }, end: { x = 5000, y = 10000 }},
 { start: { x = 5000, y = 10000 }, end: { x = 10000, y = 10000 }}
]

Вывод: ~235 минут

см. объяснение по ссылке https://telegra.ph/Task-61-Dorozhnaya-sluzhba-01-11
 */
include_once ('functions.php');

$x = 0; $y = 0;
$arr = [
  [0, 0, 10000, 10000],
  [5000, -10000, 5000, 10000],
  [5000, 10000, 10000, 10000]
];

$totalDist = 0;
foreach ($arr as $a){
  $totalDist += distanceBetweenPoints($a[0], $a[1], $a[2], $a[3]);
}

echo round(3*$totalDist/500);