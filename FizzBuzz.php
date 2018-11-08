<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 08.11.2018
 * Time: 18:16
 */
/*$arr = array();
for ($i = 1; $i < 101; $i++) $arr[$i] = '';
for ($i = 3; $i < 101; $i +=3) $arr[$i] .= 'Fizz';
for ($i = 5; $i < 101; $i +=5) $arr[$i] .= 'Buzz';
for ($i = 1; $i < 101; $i++){
  if ($arr[$i] != ''){
    echo $arr[$i]."<br/>";
  } else {
    echo $i."<br/>";
  }
}*/

for ($i = 1; $i < 101; $i++){
  $s = '';
  if ($i % 3 == 0) $s .='Fizz';
  if ($i % 5 == 0) $s .='Buzz';
  if ($s != ''){
    echo "$s <br/>";
  } else {
    echo $i."<br/>";
  }
}



