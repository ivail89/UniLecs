<?php
/*
 * UniLecs #173. Алгоритм ROT13
 *
 * Задача: реализовать алгоритм шифрования ROT13
 *
 * Входные данные: str - строка размера от 1 до 1000, состоящая из любых символов A-Za-z, чисел 0-9 или спец.символов.
 * Вывод: зашифрованное алгоритмом ROT13 сообщение.
 *
 * Пример: str = "Hello World"
 * Answer: "Uryyb Jbeyq
 *
 * Идея: так как в алгоритме рот13 кодируются только буквы, то достаточно делать смещение на 13 для каждой буквы,
 * при достижении Z делаем смещение в обратном направлении
 *
 * НО мне больше интересно использовать несколько встроенных функций для работы со строками
 */
require_once 'functions.php';

$str = "Hello World";

echo str_rot13($str) . PHP_EOL; // встроенная функция для кодирования алгоритмом ROT13
echo strtr($str,
    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
    'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm') . PHP_EOL; // используем функцию посимвольной замены
echo str_replace(str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),
  str_split('NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm'),
  $str); // Используем две функции по символьного разделения строки в массив и замена подсроки строкой

// Последний вариант будет отличаться от ожидаемого, так как может произойти множественная (см. документацию)