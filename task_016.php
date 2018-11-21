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
);

$cash = array(
  5000 => 0,
  1000 => 0,
  500 => 0,
  100 => 0,
  50 => 0,
);

function bankomat($sum){
  if ($sum % 50 != 0) return "Sum isn'n correct";
  global $cash, $cash_able;
  foreach ($cash as $key => $value){
    $x = floor($sum / $key);
    if ($x <= $cash_able[$key]){
      $cash[$key] = $x;
      $sum %= $key;
    } else {
      $cash[$key] = $cash_able[$key];
      $sum -= $cash_able[$key]*$key;
    }
  }
  return $cash;
}

foreach (bankomat(12250) as $key => $value) {
  if ($value != 0)
    echo ($key != 50) ? "$key*$value + ":"$key*$value";
}


