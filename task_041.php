<?php
/*
 * Task 41. Ханойские башни
 * Задача: даны три стержня A, B, C, на один из которых нанизаны N колец, причём кольца отличаются размером и лежат меньшее на большем.
 * Задача состоит в том, чтобы перенести пирамиду из N колец за наименьшее число ходов на другой стержень.
 * За один раз разрешается переносить только одно кольцо, причём нельзя класть большее кольцо на меньшее.
 * Напишите функцию разбора для N колец. Функция должна выводить на экран каждый шаг.
 *
 * Решение: немного поиграв на листочке, можно увидеть зависимости:
 * 1. Число перестановок равно 2^n-1, где т-число чисков
 * 2. Для чётного числа дисков нужно повторять действия A <-> B, A <-> C, B <-> C
 * 3. Для чётного числа дисков нужно повторять действия A <-> C, A <-> B, B <-> C
 *
 * где A <-> B означает перекладываем диск cо столба А на В или с В на А, в зависимости что меньше
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

const N = 10; // Количество дисков
$attempts = 2**N - 1; // Необходимое число перестановок
// Заполняем столбы исходными данными
for ($i=0; $i<N; $i++) $poleA[$i] = $i+1;
$poleB = array_fill(0, N-1, 0);
$poleC = array_fill(0, N-1, 0);

// Функция отрисовки текущего состояния столбов
function printPoles(){
  global $poleA, $poleB, $poleC;
  echo '_____' . PHP_EOL;
  for ($i=0; $i<N; $i++){
    echo ($poleA[$i] ? : ' ') . ' ';
    echo ($poleB[$i] ? : ' ') . ' ';
    echo ($poleC[$i] ? : ' ') . PHP_EOL;
  }
  echo '_____' . PHP_EOL . PHP_EOL . PHP_EOL;
}

// Снимаем верхний диск если realOnly = false, в противном случае получаем вес верхнего диска, не снимая его
function getTop(&$pole, $readOnly = false){
  for ($i=0; $i<N; $i++){
    if ($pole[$i]) { // 0 - значит, что диска нет, у диска д.б. вес от 1 до т
      if ($readOnly) return $pole[$i]; // Возвращаем вес диска
      $resp = $pole[$i]; // либо снимаем диск
      $pole[$i] = 0;
      return $resp;
    }
  }
}

// Кладем диск el на столб pole
function setTop(&$pole, $el){
  foreach ($pole as $key=>$value){
    if (!$pole[N-$key-1]){ //Какой диск последний
      if ($key == 0) return $pole[N-1] = $el; // Нет ни одного диска
      return $pole[N-$key-1] = $el; // Кладем поверх крайнего
    }
  }
}

// Определяем схему в зависимости от колисества дисков
if ((N % 2) == 0){
  $cycle = [
    ['A', 'B'],
    ['A', 'C'],
    ['B', 'C']
  ];
} else {
  $cycle = [
    ['A', 'C'],
    ['A', 'B'],
    ['B', 'C']
  ];
}

$i = $attempts; // i - будем отслеживать текущий шаг
while ($i--){ // нужно сделать 2^n-1 итераций
  echo $attempts-$i-1 . ' step' . PHP_EOL;
  printPoles();

  // Так как три шаг повторяем по кругу, значит текущую запоминаем и ставим её в конец очереди
  $couple = array_shift($cycle);
  array_push($cycle, $couple);

  // Получаем злементы один раз, чтобы не нагружать поиском для каждого сравнения
  $el1 = getTop(${'pole'.$couple[0]}, true); // Столб 1 это не столб А, это первый столб по порядку, т.е. м.б. как А, так и В
  $el2 = getTop(${'pole'.$couple[1]}, true); //Тут м.б. как В так и С
  // getTop вернёт 0 только в одном случае, если на столбе нет дисков, в протовном случае это будет вес диска

  // Два пустых столба могут быть только в начае и в конце, но мы начинаем получать с первого столба, который не пустой
  if ($el2 == 0){ // Второй столб пустой, значит на него кладем диск
    setTop(${'pole'.$couple[1]}, getTop(${'pole'.$couple[0]}));
  } elseif ($el1 == 0){
    setTop(${'pole'.$couple[0]}, getTop(${'pole'.$couple[1]}));
  } elseif ($el1 > $el2){ // На первом столбе диск тяжелее, значит кладём на него диск со второго столба
    setTop(${'pole'.$couple[0]}, getTop(${'pole'.$couple[1]}));
  } else { // На втором столбе диск тяжелее - кладём на него
    setTop(${'pole'.$couple[1]}, getTop(${'pole'.$couple[0]}));
  }
}

echo $attempts-$i-1 . ' step' . PHP_EOL;
printPoles();
