<?php
/**
 * Найти слово в символьной матрице. Дана символьная матрица и искомое слово. 
 * Слово может располагаться по горизонтали, вертикали и диагонали.
 *
 * Идея: находим все случаи первой буквы, дальше вокруг этих вариантов находим вторую букву и т.д
 * Для каждой найденой буквы сохраняем уникальный id и id предыдущей буквы.
 * По ним будем потом восстанавливать в обратном порядке исходное слово.
 */

header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
$word = 'bird'; // искомое слово
$matrix =[ // буквенная матрица
	['d', 'b', 'i', 'r', 'd'],
	['d', 'r', 'i', 'b', 'a'],
	['r', 'r', 'a', 'r', 'a'],
	['i', 'd', 'a', 'b', 'd'],
	['b', 'a', 'a', 'i', 'r'],
  ['b', 'a', 'a', 'i', 'r']
];

/*
 * arr_word состоит из индексов букв искомого слова, для каждой буквы (индекса) храним все найденые буквы ввида
 * i, j - позиция буквы
 * id - буквы для данного prev_id
 * prev_id - предыдущей буквы
 */
$arr_word = array_flip(str_split($word)); // Получаем массив с индексами букв исходного слова
foreach ($arr_word as $i => $value) { $arr_word[$i] = []; } // В эти массивы будем записывать найденные буквы

// Определяем все варианты начала слова
foreach ($matrix as $i => $string)
	foreach ($string as $j => $letter)
		if ($letter == $word[0])
      $arr_word[$word[0]][] = [$j, $i, uniqid(), null]; // Тут не перепутал, чтение идёт именно в этой последовательности

$letters = str_split($word); // Так как foreach не делит строку на символы, нужно слово преобразовать в массив
$len_word = strlen($word) - 1; // Чтобы на каждой итерации не делать вычисление, отнимем сразу границу
foreach ($letters as $key => $letter){
  if ($key == $len_word) continue; // Так как дальше у нас есть сдвиг на одну букву, закончить нужно на предпоследней
  foreach ($arr_word[$letter] as $k => $pos){
    $res = selectionSuitable($pos[2], $pos[1], $pos[0], $letters[$key+1]); // собрали все варианты вогруг данной буквы
    if (empty($res)) unset ($arr_word[$letter][$k]); // Если подходящих вариантов нет, сразу выкидываем её из выборки
    foreach ($res as $r) $arr_word[$letters[$key+1]][] = $r; // Чтобы не создавать массив в массиве, сохраняем исходные вид, для каждого индекса множество букв из матрицы
  }
}

$res = [];
foreach ($arr_word[$word[$len_word]] as $value) // Строим все варианты с конца, только так можно пройти до головы без двойников
  $res[] = buildWord($len_word-1, $value[3]) . ' | '. $value[0] . ' - ' . $value[1] . "\n";
$res = array_unique ($res); // ну, а вдруг =)

print_r($res);

/*
 * i, j - кординаты буквы вокруг которой проверяем следующую букву
 * next_letter - искомая буква
 * prev_id - ИД предыдущей буквы
*/
function selectionSuitable($prev_id, $i, $j, $next_letter){
  $res = [];
  global $matrix;
  $width = count($matrix[0]); // Границы будем использовать, чтобы не выйти за пределы матрицы
  $height = count($matrix);

  if (($j != 0) && ($matrix[$i][$j-1] == $next_letter)) $res[] = [$i,$j-1, uniqid(), $prev_id]; //Направление 0 1
  if (($i+1 != $width) && ($j != 0) && ($matrix[$i+1][$j-1] == $next_letter)) $res[] = [$i+1, $j-1, uniqid(), $prev_id]; //Направление 1 1
  if (($i+1 != $width) && ($matrix[$i+1][$j] == $next_letter)) $res[] = [$i+1, $j, uniqid(), $prev_id]; //Направление 1 0
  if (($i+1 != $width) && ($j+1 != $height) && ($matrix[$i+1][$j+1] == $next_letter)) $res[] = [$i+1, $j+1, uniqid(), $prev_id]; //Направление 1 -1
  if (($j+1 != $height) && ($matrix[$i][$j+1] == $next_letter)) $res[] = [$i, $j+1, uniqid(), $prev_id]; //Направление 0 -1
  if (($i != 0) && ($j+1 != $height) && ($matrix[$i-1][$j+1] == $next_letter)) $res[] = [$i-1,$j+1, uniqid(), $prev_id]; //Направление -1 -1
  if (($i != 0) && ($matrix[$i-1][$j] == $next_letter)) $res[] = [$i-1, $j, uniqid(), $prev_id]; //Направление -1 0
  if (($i != 0) && ($j != 0) && ($matrix[$i-1][$j-1] == $next_letter)) $res[] = [$i-1, $j-1, uniqid(), $prev_id]; //Направление -1 1

  return $res;
}

/*
 * Рекурсивная функция построения слова по индексам в обратном порядке
 * letter_pos - позиция буквы в слове, которая должна быть следующей
 * prev_id - ид следующей буквы
 */
function buildWord ($letter_pos, $prev_id){
  global  $arr_word, $word;
  foreach ($arr_word[$word[$letter_pos]] as $item){
    if ($item[2] == $prev_id){
      if ($letter_pos == 0) { // Слово собрано целиком
        return  "$item[1] - $item[0]";
      } else {
        return buildWord($letter_pos-1 , $item[3]) . ' | '. "$item[0] - $item[1]"; // Нашли промежуточную букву
      }
      continue; // Так как ид уникален для prev_id как нашли переходим дальше
    }
  }
}