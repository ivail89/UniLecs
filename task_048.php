<?php
/*
 * Task 48. Выборы
 * Задача(задача с сайта acmp.ru): В одном из государств все решения традиционно принимались простым большинством голосов на общем собрании граждан, которых, к счастью, было не очень много.
 * Прошла реформа. Ее суть состояла в следующем: с момента введения ее в действие все избиратели острова делились на K групп (необязательно равных по численности). Голосование по любому вопросу теперь следовало проводить отдельно в каждой группе, причем считалось, что группа высказывается "за", если "за" голосует более половины людей в этой группе, а в противном случае считалось, что группа высказывается "против". После проведения голосования в группах подсчитывалось количество групп, высказавшихся "за" и "против", и вопрос решался положительно в том и только том случае, когда групп, высказавшихся "за", оказывалось более половины общего количества групп.
 * Эта система вначале была с радостью принята жителями острова. Когда первые восторги рассеялись, очевидны стали, однако, некоторые недостатки новой системы. Оказалось, что сторонники партии, предложившей систему, смогли оказать некоторое влияние на формирование групп избирателей. Благодаря этому, они получили возможность проводить некоторые решения, не обладая при этом реальным большинством голосов.
 * Пусть, например, на острове были сформированы три группы избирателей, численностью в 5, 5 и 7 человек соответственно. Тогда партии достаточно иметь по три сторонника в каждой из первых двух групп, и она сможет провести решение всего 6-ю голосами "за", вместо 9-и, необходимых при общем голосовании.
 *
 * Входные данные: Дан массив, ктр содержит K натуральных чисел, которые задают количество избирателей в группах. Население острова не превосходит 30000 человек.
 * Напишите функцию, которая по заданному разбиению избирателей на группы определит минимальное количество сторонников партии, достаточное для принятия любого решения.
 *
 */
header("Content-Type: text/plain; charset=utf8"); // Без этого перенос строки не работает

$arr1 = [ 5, 5, 7 ];
$arr2 = [ 4, 2, 1, 3, 7 ];

function countMinVotes($arr){
  $count = (int)(count($arr) / 2) + 1; //Достаточно только половины + 1 для принятия решения
  sort($arr); // Выбираем половину групп с минимальным числом участников
  $votes = 0;
  for ($i = 0; $i < $count; $i++){
    $votes += (int)($arr[$i] / 2) + 1; // В каждой группе необходимо половина плюс один участник для победы
  }
  return $votes;
}

echo countMinVotes($arr1) . PHP_EOL;
echo countMinVotes($arr2) . PHP_EOL;
