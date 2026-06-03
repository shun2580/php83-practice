<?php
require_once __DIR__ . '/_helper.php';

$cases = [
    [[1, 5, 1],  [1, 2, 3, 4, 5]],
    [[0, 10, 2], [0, 2, 4, 6, 8, 10]],
    [[5, 5, 1],  [5]],
    [[3, 9, 3],  [3, 6, 9]],
    [[0, 0, 1],  [0]],
];

foreach ($cases as [[$start, $end, $step], $expected]) {
    $result = array_values(iterator_to_array(range_gen($start, $end, $step)));
    assert_eq($expected, $result, "range_gen({$start}, {$end}, {$step})");
}
