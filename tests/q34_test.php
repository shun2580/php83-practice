<?php
require_once __DIR__ . '/_helper.php';

// 正常系: 有効な年齢は値をそのまま返す
foreach ([0, 1, 25, 100, 150] as $age) {
    try {
        $result = validateAge($age);
        assert_eq($age, $result, "validateAge({$age}) === {$age}");
    } catch (Throwable $e) {
        echo "FAIL: validateAge({$age}) は例外をスローすべきでない\n";
    }
}

// 異常系: 範囲外は InvalidAgeException をスロー
foreach ([-1, -100, 151, 200] as $age) {
    try {
        validateAge($age);
        echo "FAIL: validateAge({$age}) は InvalidAgeException をスローすべき\n";
    } catch (InvalidAgeException $e) {
        echo "PASS: validateAge({$age}) が InvalidAgeException をスロー\n";
    } catch (Throwable $e) {
        echo "FAIL: validateAge({$age}) が InvalidAgeException ではなく " . get_class($e) . " をスロー\n";
    }
}
