<?php
/**
 * Найти слово в символьной матрице. Дана символьная матрица и искомое слово. 
 * Слово может располагаться по горизонтали, вертикали и диагонали.
 * Находим все первые буквы в матрицы и проверяем по ним все восемь направлений. 
 */

header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает
$matrix =[
	['d', 'b', 'i', 'r', 'd'],
	['d', 'i', 'i', 'b', 'a'],
	['r', 'r', 'a', 'r', 'a'],
	['i', 'd', 'a', 'b', 'd'],
	['b', 'a', 'a', 'i', 'r']
];

$word = 'bird';

// Определяем все варианты начала слова
$start_word = array();
$i_count = count($matrix); 
$j_count = count($matrix[0]); 
$length_word = strlen($word);
foreach ($matrix as $i => $string){
	foreach ($string as $j => $letter){
		if ($letter == $word[0]){
			$start_word[] = [$j, $i];
			echo "$j : $i - is start\n";
		}
	}
}

// Поочереди проверяем все напрвления от первой буквы
foreach ($start_word as $first_letter){
	
	//Направление 01
/*
	if (($first_letter[1] + 1 - $length_word) < 0){ // Проверяем сколько символов до края матрицы, на случай если слово не помещается
		echo "Позиция $first_letter[0]:$first_letter[1] Направление 01 - не подходит по длине\n";
	} else {
		$str = '';
		echo "Позиция $first_letter[0]:$first_letter[1] - Направление 01: ";
		for ($i = $length_word; $i > 0; $i--){
			$str .= $matrix[$first_letter[1]-$length_word + $i][$first_letter[0]]; // От первой буквы собираем слово равное длине искомого
		} 
		if ($word == $str) echo "Совпадает\n";
		else echo "Не совпадает\n";
	}
*/
	//Направление 11
	
	//Направление 10
/*
	if (($first_letter[0] + $length_word) > $j_count){ // Проверяем сколько символов до края матрицы, на случай если слово не помещается
		echo "Позиция $first_letter[0]:$first_letter[1] Направление 10 - не подходит по длине\n";
	} else {
		$str = '';
		echo "Позиция $first_letter[0]:$first_letter[1] - Направление 10: ";
		for ($i = 0; $i < $length_word; $i++){
			$str .= $matrix[$first_letter[1]][$first_letter[0] + $i]; // От первой буквы собираем слово равное длине искомого
		} 
		if ($word == $str) echo "Совпадает\n";
		else echo "Не совпадает\n";
	}
*/
	
	//Направление 1-1
	
	//Направление 0-1
/*
	if (($first_letter[1] + $length_word) > $i_count){ // Проверяем сколько символов до края матрицы, на случай если слово не помещается
		echo "Позиция $first_letter[0]:$first_letter[1] Направление 0-1 - не подходит по длине\n";
	} else {
		$str = '';
		echo "Позиция $first_letter[0]:$first_letter[1] - Направление 0-1: ";
		for ($i = 0; $i < $length_word; $i++){
			$str .= $matrix[$first_letter[1] + $i][$first_letter[0]]; // От первой буквы собираем слово равное длине искомого
		} 
		if ($word == $str) echo "Совпадает\n";
		else echo "Не совпадает\n";
	}
*/	
	//Направление -1-1
	
	//Направление -10
	if (($first_letter[1] + $length_word) > $i_count){ // Проверяем сколько символов до края матрицы, на случай если слово не помещается
		echo "Позиция $first_letter[0]:$first_letter[1] Направление 0-1 - не подходит по длине\n";
	} else {
		$str = '';
		echo "Позиция $first_letter[0]:$first_letter[1] - Направление 0-1: ";
		for ($i = 0; $i < $length_word; $i++){
			$str .= $matrix[$first_letter[1] + $i][$first_letter[0]]; // От первой буквы собираем слово равное длине искомого
		} 
		if ($word == $str) echo "Совпадает\n";
		else echo "Не совпадает\n";
	}
	
	//Направление -11
} 
