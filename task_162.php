<?php
/*
 * UniLecs #162. Равенство бинарных деревьев
 * Задача: даны два бинарных дерева. Необходимо определить, равны они друг другу или нет.
 *  Напоминаем, что одинаковые деревья имеют одинаковое расположение узлов и значений в них.
 *
 * Входные данные: A - бинарное дерево, B - бинарное дерево
 * Вывод: true/false
 *
 * Идея: вижу несколько возможных вариантов решения.
 * 1. Если хранить дерево в массиве, тогда можно использовать встроенную функцию php сравнения массивов
 * 1.1 Рекурсивно обходить деревья и сравнивать чтобы корни и поддеревья были равны
 * 2. Использовать свойство двоичного дерева: набор значений имеет только один вариант дерева, то можно обойти дерево и сравнить посимвольно элементы.
 *
 * Мне интересно попробовать поработать с SLP библиотекой, поэтому буду реализовывать последний варинт
 */
require_once 'functions.php';

$tree1 = new SplMaxHeap();
foreach ([1, 5, 6, 10, 12, 14, 15] as $el) {
  $tree1->insert($el);
}

$tree2 = clone $tree1;
$tree3 = clone $tree1;

$tree4 = new SplMaxHeap();
foreach ([1, 5, 8, 10, 12, 16, 15] as $el) {
  $tree4->insert($el);
}

function compareTrees(SplMaxHeap $tree1, SplMaxHeap $tree2)
{
  if ($tree1->count() != $tree2->count()) {
    return $tree1->count() . ' !='. $tree2->count();
  }
  $tree1->rewind();
  $tree2->rewind();
  while ($tree1->valid()) {
    if ($tree1->current() !== $tree2->current()) {
      return 'false';
    } else {
      $tree1->next();
      $tree2->next();
    }
  }
  return 'true';
}

echo compareTrees($tree1, $tree2) . PHP_EOL;
echo compareTrees($tree3, $tree4) . PHP_EOL;