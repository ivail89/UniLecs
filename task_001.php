<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 18.09.2018
 * Time: 16:06
 */
    //$str = 'zaq123wsxcde34rvbgt56yhnmju78ik,jgrfgytdegh';
    $str = '123456789';
    $arr = str_split($str);
    sort($arr);

    $flag = 0;
    for ($i = 0; $i < strlen($str)-2; $i++){
        if ($arr[$i] == $arr[$i+1]){
            echo $arr[$i].' - duble';
            $flag = 1;
            break;
        }
    }
    if (!$flag) echo 'Uniq';