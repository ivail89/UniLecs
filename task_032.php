<?php
/*
 * Task 32. Найти начало цикла в односвязном списке
 * Задача: Дан односвязный список с циклом, найти начало этого цикла.
 * Можно строить хеш таблицу и когда будет найдёно повторение элемента, этот можно считать началом цикла.
 * Однако в данном случае предполагается использование алгоритма с двумя указателями, чтобы сократить использумые ресурсы.
 *
 * Мы знаем, что более быстры указатель (rabbit) рано или поздно догонит медленного (turtle). При чем место встречи будет
 * не в начале цикла, а где угодно.
 *
 * https://telegra.ph/file/d7f675c38aadbc70124b7.png - Так будет выглядеть пройденные расстояния
 *
 * Расстояние пройденное turtle до встречи с rabbit: x + y
 * Расстояние пройденное rabbit до встречи c turtle: (x + y + z) + y = x + 2y + z
 *
 * Скорость кролика в два раза быстре, значит он пройдет путь в два раза больше 2 (x + y) = x + 2y + z
 * Отсюда следует, что x = z
 *
 * Решение:
 * 1. Помещаем один из указателей на начало списка, второ оставляем в точке встречи
 * 2. Запускаем оба указателя с шагом 1
 * 3. Теперь два указателя встретятся в точке начала цикла
 */

// Специально использую сложную форму представления списка ввиде таблицы, чтобы нагляднее было работа со списком
// как тут https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%B4%D0%B0%D1%87%D0%B0_%D0%BD%D0%B0%D1%85%D0%BE%D0%B6%D0%B4%D0%B5%D0%BD%D0%B8%D1%8F_%D1%86%D0%B8%D0%BA%D0%BB%D0%B0
$list_with_cycle =[
  0 => 6,
  1 => 6,
  2 => 0,
  3 => 1,
  4 => 4,
  5 => 3,
  6 => 3,
  7 => 4,
  8 => 0,
];

// Получаем слудующее значение списка, $current_point - x для которого нужно вычеслить f(x)
function getNextPoint($current_point = 0){
  global $list_with_cycle;
  return $list_with_cycle[$current_point]; // Ассоциативный массив позволяем легко получить значение
}

// Предполагаем, что цикл есть - в противном случае улетим в бесконечный цикл
// Получаем точку пересечения
function getMeetPoing(){
  $turtle = getNextPoint();
  $rabbit = getNextPoint(getNextPoint());

  while ($turtle != $rabbit) {
    $turtle = getNextPoint($turtle);
    $rabbit = getNextPoint(getNextPoint($rabbit)); // Кролик идёт в два раза быстрее, чем черепахо
  }

  return $rabbit; // Можно любого вернуть, так как ищём когда они равны
}

//Находим начало цикла
function getStartCycle(){
  $turtle = getNextPoint(); // Черепаха в начало списка
  $rabbit = getNextPoint(getMeetPoing()); // Кролик в точку встречи
  while ($turtle != $rabbit){ // Идём пока не встретятся, смещение на один, чтобы не пропустить встречу
    $turtle = getNextPoint($turtle);
    $rabbit = getNextPoint($rabbit);
  }
  return $rabbit;
}

echo getStartCycle();