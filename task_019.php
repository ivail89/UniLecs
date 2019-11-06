<?php
/**
 * Найти слово в символьной матрице. Дана символьная матрица и искомое слово. 
 * Слово может располагаться по горизонтали, вертикали и диагонали.
 * Находим все первые буквы в матрицы и проверяем по ним все восемь направлений. 
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

$arr_word = array_flip(str_split($word)); // Получаем массив с индексами букв исходного слова
foreach ($arr_word as $i => $value) { $arr_word[$i] = []; } // В эти массивы будем записывать найденные буквы
$width = count($matrix[0]);
$height = count($matrix);
$letter_used = array_fill(0, $height, array_fill(0, $width, false)); // true - если это символ уже добавлен

// Определяем все варианты начала слова
foreach ($matrix as $i => $string){
	foreach ($string as $j => $letter){
		if ($letter == $word[0]) {
      $arr_word[$word[0]][] = [$j, $i];
    }
  }
}

$letters = str_split($word);
$len_word = strlen($word) - 1;
foreach ($letters as $key => $letter){
  if ($key == $len_word) continue;
  foreach ($arr_word[$letter] as $k => $pos){
    $res = selectionSuitable($pos[1], $pos[0], $letters[$key+1]);
    if (empty($res)) unset ($arr_word[$letter][$k]);
    foreach ($res as $r)
      if (!$letter_used[$r[1]][$r[0]]){
        $arr_word[$letters[$key+1]][] = $r;
        $letter_used[$r[1]][$r[0]] = true;
      }
  }
}


/*
* i, j - кординаты буквы вокруг которой проверяем следующую букву
* next_letter - искомая буква
*/
function selectionSuitable($i, $j, $next_letter){
  $res = [];
  global $matrix, $width, $height;

  if (($j != 0) && ($matrix[$i][$j-1] == $next_letter)) $res[] = [$i,$j-1]; //Направление 0 1
  if (($i+1 != $width) && ($j != 0) && ($matrix[$i+1][$j-1] == $next_letter)) $res[] = [$i+1,$j-1]; //Направление 1 1
  if (($i+1 != $width) && ($matrix[$i+1][$j] == $next_letter)) $res[] = [$i+1,$j]; //Направление 1 0
  if (($i+1 != $width) && ($j+1 != $height) && ($matrix[$i+1][$j+1] == $next_letter)) $res[] = [$i+1,$j+1]; //Направление 1 -1
  if (($j+1 != $height) && ($matrix[$i][$j+1] == $next_letter)) $res[] = [$i,$j+1]; //Направление 0 -1
  if (($i != 0) && ($j+1 != $height) && ($matrix[$i-1][$j+1] == $next_letter)) $res[] = [$i-1,$j+1]; //Направление -1 -1
  if (($i != 0) && ($matrix[$i-1][$j] == $next_letter)) $res[] = [$i-1,$j]; //Направление -1 0
  if (($i != 0) && ($j != 0) && ($matrix[$i-1][$j-1] == $next_letter)) $res[] = [$i-1,$j-1]; //Направление -1 1

  return $res;
}