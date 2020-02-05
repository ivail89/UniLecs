<?php
/**
 * Task 22. Перестановка четных/нечетных элементов в массиве
 * Задача: дан числовой массив. Выполнить перестановку в массиве так, чтобы все четные элементы были слева, все нечетные - справа.
 *
 * Решение: задача предполагает использование методов перестановки жлементов, но в данном случае я буду использовать
 *  встроенные методы PHP, что бы попрактиковаться в их использовании.
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

$arr = [1, 5, 6, 7, 2, 3, 4, 8];

for ($i = 0; $i < count($arr); $i++){
    // Определяем какой элемент, чётный или нет
    if ($arr[$i] % 2 == 0){
        array_unshift($arr, $arr[$i]); // Добавляем в начало массива
        unset($arr[$i]);
    } else {
        array_push($arr, $arr[$i]); // Добавляем в конец массива
        unset($arr[$i]);
    }
}

print_r($arr);