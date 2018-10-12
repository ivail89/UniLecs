<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 19.09.2018
 * Time: 12:03
 * Задача: Дан отсортированный по возрастанию массив, но циклически сдвинут.
 * Пример, [3, 4, 5, 6, 7, 8, 1, 2]
 * Написать алгоритм, ктр оптимально находит минимальный элемент в таком массиве.
 */

    //$arr = array(9,1,2,3,4,5,6,7,8);
    //$arr = array(3,4,5,6,7,8,9,1,2);
    //$arr = array(2,1,1,1,1,1,1,1,1);
    $arr = array(2,1,1,1,1,1,1,1,2);

    $i = 0;
    $j = floor(count($arr) / 2) - 1;
    if ($arr[$i] >= $arr[$j]){
        $i = 0;
    } else {
        $i = floor(count($arr) / 2);
        $j = count($arr) - 1;
    }

    echo "$i    $j   <br/>";

    while (($j - $i) > 1){
        if ($arr[$i] >= $arr[$j]){
            $i = $i + floor(($j - $i) / 2);
        } else {
            $j = $i + floor(($j - $i) / 2);
        }
        echo "$i    $j   <br/>";
    }

    echo ($arr[$i] < $arr[$j]) ? $arr[$i] : $arr[$j];