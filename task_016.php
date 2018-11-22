<?php
/**
 * Банкомат. Разбить сумму с учетом в первую очередь идут купюры максимального наминала
 * Номинал купюр: 50 / 100 / 500 / 1000 / 5000
 */

$cash_able = array(
  5000 => 1,
  1000 => 10,
  500 => 10,
  100 => 10,
  50 => 1000,
  30 => 1000,
);

$cash = array(
  5000 => 0,
  1000 => 0,
  500 => 0,
  100 => 0,
  50 => 0,
  30 => 0,
);

$nominal = array(5000, 1000, 500, 100, 50, 30);

function bankomat($sum){
  global $cash_able, $cash, $nominal;

  $tmpSum = $sum;
  foreach ($nominal as $n) {
    $sum = $tmpSum;
    foreach ($cash as $k => $v) $cash[$k] = 0;
    foreach ($cash as $key => $value) {
      if ($key <= $n) {
        $x = floor($sum / $key);
        if ($x <= $cash_able[$key]) {
          $cash[$key] = $x;
          $sum %= $key;
        } else {
          $cash[$key] = $cash_able[$key];
          $sum -= $cash_able[$key] * $key;
        }
      }
    }

    if ($sum == 0) break;
  }
  if ($sum > 0) return "Sum isn'n correct";
  return $cash;
}

$res = bankomat(120);
if (is_array($res)){
  foreach ($res as $key => $value) {
    if ($value != 0)
      echo ($key != 30) ? "$key*$value + ":"$key*$value";
  }
} else echo $res;
