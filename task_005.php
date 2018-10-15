<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 08.10.2018
 * Time: 18:30
 * Задача: Написать функцию, ктр будет проверять можно ли преобразовать строку так, чтобы она стала палиндромом.
 * Пример:
 * "bob" => true - уже является палиндромом
 * "bbo" => true - можно сделать палиндромом
 * "cat" => false - нельзя сделать палиндромом
 */

function polyndrom($str){
    $str = mb_strtolower ($str);
    if ($str == strrev($str)) return "$str - It's polyndrom <br/>";
    $arr = array();
    for ($i = 0; $i < strlen($str); $i++){
        if (isset($arr[$str[$i]])){
            $arr[$str[$i]]++;
        } else {
            $arr[$str[$i]] = 1;
        }
    }
    $count = 0;
    foreach ($arr as $a){
        if(($a % 2) != 0){
            $count++;
            if ($count > 1) return "$str - Can't be polyndrom <br/>";
        }
    }
    return "$str - Can be polyndrom <br/>";
}

$str1 = "boB";
$str2 = "bbo";
$str3 = "tcAtt";

echo polyndrom($str1).polyndrom($str2).polyndrom($str3);