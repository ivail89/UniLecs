<?php
/**
 * Task 23. Вывести все левые элементы в бинарном дереве
 *                    1
 *                  /   \
 *                 2     3
 *                      /  \
 *                     4    5
 *                   /   \
 *                  6     7
 * Output: 1 2 4 6
 */

$tree = [ // Используем преиммущества ассоциативных массивов для хранения дерева
  'value' => 1,
  'left' => [
    'value' => 2
  ],
  'right' => [
    'value' => 3,
    'right' => [
      'value'=> 5
    ],
    'left' => [
      'value' => 4,
      'left' => [
        'value' => 6
      ],
      'right' => [
        'value' => 7
      ]
    ]
  ]
];

/*
 * Используем рекурсию для обхода по дереву
 * $node - фрагмент дерева (узел), который будем анализировать
 * $key - ключ предыдущего узла, чтобы понимать выводим значение или нет
 */
function printLeftValue($node, $key){
  if ($key == 'left') echo $node['value'] . ' '; // Вывод значений
  if (isset($node['left'])) printLeftValue($node['left'], 'left'); // Анализируем правый фрагмент
  if (isset($node['right'])) printLeftValue($node['right'], 'right'); // Анализируем левый фрагмент
}

printLeftValue($tree, 'left'); // Запускаем с левым ключом, так как корень всегда