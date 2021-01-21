<?php
/*
 * Анонс #152. Преобразование строки
 * Задача: Дана строка, ктр состоит из латинских букв и спец.символов, ктр являются разделителями между словами.
 * Вам необходимо заменить в каждом слове N-ю букву на заданный символ.
 *
 * Входные данные:
 * inputStr - входная строка,
 * delimiters[] - символьный массив разделителей.
 * N - индекс заменяемого символа в слове.
 * Symbol - символ ктр нужно заменить N-й символ в каждом слове.
 *
 * Вывод: преобразованную строку.
 *
 * Пример:
 * inputStr = "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
 * delimiters = [' ']
 * N = 2
 * Symbol = "%"
 * Result = "L%rem i%sum d%lor s%t a%et, c%nsectetur a%ipiscing e%it."
 */
require_once 'functions.php';

$inputStr = "Lorem ipsum dolor_sit amet,consectetur adipiscing elit.";
$delimiters = [' ', '_', ',','.'];
$n = 2;
$symbol = "%";

echo $inputStr . PHP_EOL;
$len = strlen($inputStr);
$start = 0;
for ($i = 0; $i < $len; $i++) {
  if (in_array($inputStr[$i], $delimiters)) {
    $start = $i + 1;
  } else {
    if ($i - $start + 1 == $n) {
      $inputStr[$i] = $symbol;
    }
  }
}

echo $inputStr;