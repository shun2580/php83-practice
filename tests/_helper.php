<?php
declare(strict_types=1);

function assert_eq(mixed $expected, mixed $actual, string $label): void
{
    if ($expected === $actual) {
        echo "PASS: {$label}\n";
    } else {
        $exp = json_encode($expected, JSON_UNESCAPED_UNICODE);
        $act = json_encode($actual,   JSON_UNESCAPED_UNICODE);
        echo "FAIL: {$label} — 期待値: {$exp}, 実際: {$act}\n";
    }
}

function assert_true(bool $val, string $label): void
{
    if ($val) {
        echo "PASS: {$label}\n";
    } else {
        echo "FAIL: {$label} — true を期待しましたが false でした\n";
    }
}

function assert_false(bool $val, string $label): void
{
    if (!$val) {
        echo "PASS: {$label}\n";
    } else {
        echo "FAIL: {$label} — false を期待しましたが true でした\n";
    }
}
