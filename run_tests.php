#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * CLI テストランナー
 * 使い方:
 *   php run_tests.php              # 全テスト実行
 *   php run_tests.php q08          # 指定問題のみ
 */

require_once __DIR__ . '/src/ProblemLoader.php';
require_once __DIR__ . '/src/Judge.php';

$target = $argv[1] ?? null;
$problems = ProblemLoader::all();
if ($target) {
    $problems = array_filter($problems, fn($p) => $p['id'] === $target || $p['id'] === 'q' . ltrim($target, 'q'));
    $problems = array_values($problems);
}

$total = 0; $passed = 0; $failed = 0;

echo "\n\033[1mPHP 8.3 練習問題 CLI テストランナー\033[0m\n";
echo str_repeat('─', 50) . "\n\n";

foreach ($problems as $p) {
    if ($p['type'] !== 'coding') {
        echo "\033[33m[SKIP]\033[0m {$p['id']}: {$p['title']} (コーディング問題のみ実行)\n";
        continue;
    }

    $testFile = __DIR__ . '/tests/' . $p['id'] . '_test.php';
    if (!file_exists($testFile)) {
        echo "\033[33m[SKIP]\033[0m {$p['id']}: テストファイルなし\n";
        continue;
    }

    // 解答例でテスト実行（スタータコードのまま → 失敗が期待値）
    $code = $p['starter'];
    $result = Judge::run($p, $code);

    $total++;
    $allPass = $result['passed'];

    if ($allPass) {
        $passed++;
        echo "\033[32m[PASS]\033[0m {$p['id']}: {$p['title']}\n";
    } else {
        $failed++;
        echo "\033[31m[FAIL]\033[0m {$p['id']}: {$p['title']}\n";
        foreach ($result['results'] as $r) {
            $icon = $r['pass'] ? '  \033[32m✓\033[0m' : '  \033[31m✗\033[0m';
            echo "{$icon} {$r['msg']}\n";
        }
    }
}

echo "\n" . str_repeat('─', 50) . "\n";
echo "合計: {$total}  ";
echo "\033[32m通過: {$passed}\033[0m  ";
echo "\033[31m失敗: {$failed}\033[0m\n\n";
