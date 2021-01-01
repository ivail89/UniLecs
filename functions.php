<?php
/*
 * Так как при решение задач, часто нужно при прибегать к использованию технических функций
 * Тут собиру всё необходимое, чтобы в будущем их использовать
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

/*
 * Техническая функция, для вывода матрица, в привычном для человека виде
 * $showIdx - выводим значения индексов
 */
function printMatrix($arr, $showIdx = false){
  if (!is_array($arr)) return;
  foreach ($arr as $y => $line){
    if (!is_array($line)) break;
    foreach ($line as $x => $item){
      echo $showIdx ? "($x,$y) " : $item . "\t";
    }
    echo PHP_EOL;
  }
}

// Получить все кобинации (сочетания) из множества N по M в каждом наборе
function combinationsN_M($n, $m){
  $arr = [];
  for ($i = 0; $i < $m; $i++) {
    $arr[$i] = $i + 1;
  }
  $res[] = $arr;
  while (1){
    $k = $m;
    $isFinal = true;
    for ($i = $k - 1; $i >= 0; $i--){
      if ($arr[$i] < $n - $k + $i + 1){
        $arr[$i]++;
        for ($j = $i + 1; $j < $k; $j++)
          $arr[$j] = $arr[$j - 1] + 1;
        $res[] = $arr;
        $isFinal = false;
      }
      if ($isFinal) return $res;
    }
  }
}

// Расстояние между двумя точками. Длина отрезка
function distanceBetweenPoints($x1, $y1, $x2, $y2){
  return sqrt(($x2 - $x1)**2 + ($y2 - $y1)**2);
}

// Поиск наибольшего общего делителя (НОД) двух чисел, в остнове лежит алгоритм Евклида
// https://ru.wikipedia.org/wiki/%D0%90%D0%BB%D0%B3%D0%BE%D1%80%D0%B8%D1%82%D0%BC_%D0%95%D0%B2%D0%BA%D0%BB%D0%B8%D0%B4%D0%B0
function gcd($a, $b){
  // Меняем значения местами, чтобы не получить ошибку в будущем
  if ($b > $a) list ($a, $b) = [$b, $a];
  $r = $a % $b; // Вычисляем до цикла, может быть b есть делитель для а
  while ($r > 0){
    $a = $b;
    $b = $r;
    $r = $a % $b;
  }
  return $b;
}

// Вычисление наименьшего общего кратного (НОД)
//https://ru.wikipedia.org/wiki/%D0%9D%D0%B0%D0%B8%D0%BC%D0%B5%D0%BD%D1%8C%D1%88%D0%B5%D0%B5_%D0%BE%D0%B1%D1%89%D0%B5%D0%B5_%D0%BA%D1%80%D0%B0%D1%82%D0%BD%D0%BE%D0%B5
function lcm($a, $b){
  $res = abs($a*$b) / gcd($a, $b);
  return $res != 1 ? : false;
}

// Поиск левой нижней и правой верхней координаты матрицы по координатам точек
function findEdgesPoint($arr){
  list ($minX, $minY) = $arr[0];
  list ($maxX, $maxY) = $arr[0];
  foreach ($arr as $line) {
    if ($line[0] < $minX) $minX = $line[0];
    if ($line[1] < $minY) $minY = $line[1];
    if ($line[0] > $maxX) $maxX = $line[0];
    if ($line[1] > $maxY) $maxY = $line[1];
  }
  return [$minX, $minY, $maxX, $maxY];
}

// Получить все варинты чисел для n битов
function setsOfBits($n){
  if ($n == 1) {
    return ['0', '1'];
  }
  $arr = setsOfBits($n - 1);
  $res = [];
  foreach ($arr as $a) {
    $res [] = $a . '0';
    $res [] = $a . '1';
  }
  return $res;
}

// Получение простых чисел от 2 до n
function findPrimeNumber($n){
  $arr2 = array_fill(2, $n-1, true); // Создаём исходный список
  foreach ($arr2 as $key => $value) // Перебираем элементы всего списка
    for ($i = $key; $n+1 > $i * $key; $i++) unset($arr2[$i*$key]); // Вычёркиваем все кратные данному числу
  return $arr2;
}

/*
 * Расложить число на простые множители
 * На выходе будет массив с парами [number, degree]
 * number - простое число
 * degree - степень простого числа
 */
function separateNumberOnPrimeNumbers($n){
  $arr = findPrimeNumber($n);       // Нашли все простые числа
  $res = [];
  foreach ($arr as $number => $v) { // Раскладываем число на простые множетели и их степени
    if ($n % $number == 0) {        // Нашли простой дилитель
      $degree = 1;
      $n = intdiv($n, $number);     // Уменьшаем число на этот делитель
      while ($n % $number == 0) {   // проверим может степень это числа выше 1
        $n = intdiv($n, $number);
        $degree++;
      }
      $res [] = [$number, $degree];
      if ($n == 0) break;           // Чтобы цикл не молотил в холотсую выходим из него
    }
  }
  return $res;
}

// Вычисление факториала числа n
function factorial($n){
  $res = 1;
  for ($i = 1; $i < $n + 1; $i++) {
    $res *= $i;
  }
  return $res;
}

// вычисление биномиального коэффициента Cnk
// воспользуемся аналитической формулой http://e-maxx.ru/algo/binomial_coeff,
// применим возможности php для работы с большими числами https://www.php.net/manual/ru/book.bc.php
function cnk($n, $k){
  $fn = 1;
  for ($i = 1; $i < $n+1; $i++) $fn = bcmul($fn, $i);

  $fk = 1;
  for ($i = 1; $i < $k+1; $i++) $fk = bcmul($fk, $i);

  $nk = $n - $k;
  $fnk = 1;
  for ($i = 1; $i < $nk+1; $i++) $fnk = bcmul($fnk, $i);

  $cnk = bcdiv($fn, bcmul($fk, $fnk));

  return $cnk;
}

//Функция для вывода содержимого в архиве в удобном для анализа виде
function printArray($arr){
  foreach ($arr as $value){
    echo $value . ' ';
  }
  echo PHP_EOL;
}

// Раскладываем число M на N слогаемых (с повторениями)
function getAllSummands($n, $m)
{
  $result = [];
  if ($n == 2) { // когда всего два слагаемых понятно как будет выглядеть разложение на суммы
    $l = $m;
    while ($m > -1) { // -1 : иначе последний случай (0, m) не попадет
      $result[] = [$m, $l-$m]; // собираем вариант (0, m), (1, m-1), (2, m-2), ..., (m, 0)
      $m--;
    }
  } elseif ($n == 1) { // крайний случай, вдруг прилетит
    $result[] = [$m];
  } elseif ($n > 2) { // все остальные случаи, так как при 0 и -1 считаем, что результатов нет
    // например при n=3 и m=2,
//    2 0 0
//    1 1 0
//    0 2 0
//    1 0 1
//    0 1 1
//    0 0 2
    // либо p(3,2) = p(2,2) + p(2,1) + p(2,0), где + это пересечение множеств
    for ($i = 0; $i < $m+1; $i++) {
      $res = getAllSummands($n-1, $m-$i);
      foreach ($res as $r) {
        $r[] = $i;
        $result[] = $r;
      }
    }
  }
  return $result;
}

// вычисляем сумму подматрицы
function sumSubMatrix($matrix, $x1, $y1, $x2, $y2)
{
  $sum = 0;
  for ($i = $y1; $i < $y2 + 1; $i++) {
    for ($j = $x1; $j < $x2 + 1; $j++) {
      $sum += $matrix[$i][$j];
    }
  }
  return $sum;
}

// Определяем по трем точкам, где лежит точка
// Первые две точки (А и Б) это точки линии
// Третья точка (С), по ней определяем где она лежит
// D = (х3 - х1) * (у2 - у1) - (у3 - у1) * (х2 - х1)
//- Если D = 0 - значит, точка С лежит на прямой АБ.
//- Если D < 0 - значит, точка С лежит слева от прямой.
//- Если D > 0 - значит, точка С лежит справа от прямой.
function positionPoint($x1, $y1, $x2, $y2, $x3, $y3)
{
  return ($x3 - $x1) * ($y2 - $y1) - ($y3 - $y1) * ($x2 - $x1);
}

//printMatrix(getAllSummands(3, 2));

/*$arr = setsOfBits(7);
$n = 1;
foreach ($arr as $a) {
  if (strpos($a, '111') !== false) continue;
  echo $n . ': ' . $a . PHP_EOL;
  $n++;
}*/
//echo distanceBetweenPoints(0, 0, 10, 10);
//$r = combinationsM_N(4, 3);
//printMatrix($r);
//echo lcm(1071, 71);
