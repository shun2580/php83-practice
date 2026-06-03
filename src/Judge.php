<?php
declare(strict_types=1);

class Judge
{
    /**
     * Entry point. Dispatches by problem type.
     * Returns ['passed'=>bool, 'results'=>array, 'output'=>string]
     */
    public static function run(array $problem, string $answer): array
    {
        return match ($problem['type']) {
            'choice'  => self::judgeChoice($problem, $answer),
            'text'    => self::judgeText($problem, $answer),
            'coding'  => self::judgeCoding($problem, $answer),
            default   => ['passed' => false, 'results' => [['pass' => false, 'msg' => '不明な問題タイプです']], 'output' => ''],
        };
    }

    // ── 選択問題 ────────────────────────────────────────────────
    private static function judgeChoice(array $problem, string $answer): array
    {
        $correct = (string) $problem['correct'];
        $passed  = trim($answer) === trim($correct);
        return [
            'passed'  => $passed,
            'results' => [[
                'pass' => $passed,
                'msg'  => $passed
                    ? '正解です！'
                    : "不正解です。正解は選択肢 {$correct} でした。",
            ]],
            'output'  => '',
        ];
    }

    // ── 記述式問題 ───────────────────────────────────────────────
    private static function judgeText(array $problem, string $answer): array
    {
        $normalize = fn(string $s): string => mb_strtolower(trim(preg_replace('/\s+/', ' ', $s)));
        $userAns   = $normalize($answer);
        $results   = [];
        $passed    = false;

        // acceptedAnswers があればどれか一致でOK
        if (!empty($problem['accepted_answers'])) {
            foreach ($problem['accepted_answers'] as $acc) {
                if ($normalize($acc) === $userAns) {
                    $passed = true;
                    break;
                }
            }
            $results[] = [
                'pass' => $passed,
                'msg'  => $passed ? '正解です！' : '不正解です。もう一度考えてみましょう。',
            ];
        }

        // キーワードチェック
        if (!empty($problem['keywords'])) {
            foreach ($problem['keywords'] as $kw) {
                $hit = mb_stripos($userAns, mb_strtolower($kw)) !== false;
                $results[] = ['pass' => $hit, 'msg' => "キーワード「{$kw}」" . ($hit ? ' ✓' : ' が含まれていません')];
            }
            $passed = count(array_filter($results, fn($r) => $r['pass'])) === count($results);
        }

        if (empty($results)) {
            $results[] = ['pass' => false, 'msg' => '採点基準が設定されていません'];
        }

        return ['passed' => $passed, 'results' => $results, 'output' => ''];
    }

    // ── コーディング問題 ─────────────────────────────────────────
    private static function judgeCoding(array $problem, string $code): array
    {
        $testFile = __DIR__ . '/../tests/' . $problem['id'] . '_test.php';
        if (!file_exists($testFile)) {
            return ['passed' => false, 'results' => [['pass' => false, 'msg' => 'テストファイルが見つかりません']], 'output' => ''];
        }

        // コードの基本安全チェック
        $danger = ['exec', 'system', 'shell_exec', 'passthru', 'proc_open', 'popen',
                   'file_put_contents', 'file_get_contents', 'fopen', 'unlink', 'rmdir', 'mkdir',
                   'eval', 'assert', 'curl_exec', 'curl_init'];
        foreach ($danger as $fn) {
            if (preg_match('/\b' . preg_quote($fn, '/') . '\s*\(/i', $code)) {
                return [
                    'passed'  => false,
                    'results' => [['pass' => false, 'msg' => "禁止関数 {$fn}() は使用できません"]],
                    'output'  => '',
                ];
            }
        }

        // 一時ファイルにコード＋テストを書いてサブプロセス実行
        $tmp = tempnam(sys_get_temp_dir(), 'quiz_') . '.php';
        $testCode = file_get_contents($testFile);
        // __DIR__ はテスト一時ファイル実行時に /tmp に解決されてしまうため、
        // 実際のテストディレクトリパスに置換する
        $testsDir = dirname($testFile);
        $testCode = str_replace('__DIR__', var_export($testsDir, true), $testCode);
        $combined = "<?php\ndeclare(strict_types=1);\n" . self::stripOpenTag($code) . "\n" . self::stripOpenTag($testCode);
        file_put_contents($tmp, $combined);

        $output = '';
        $retval = 0;
        exec('/usr/bin/timeout 5 /usr/local/bin/php -d display_errors=On ' . escapeshellarg($tmp) . ' 2>&1', $lines, $retval);
        @unlink($tmp);

        $output = implode("\n", $lines);

        // テスト結果をパース（"PASS: msg" / "FAIL: msg" 形式）
        $results = [];
        foreach ($lines as $line) {
            if (str_starts_with($line, 'PASS:')) {
                $results[] = ['pass' => true,  'msg' => substr($line, 5)];
            } elseif (str_starts_with($line, 'FAIL:')) {
                $results[] = ['pass' => false, 'msg' => substr($line, 5)];
            }
        }

        if (empty($results)) {
            // 実行エラーなどで何も出力されなかった場合
            $results[] = ['pass' => false, 'msg' => $output ?: '実行エラーが発生しました'];
        }

        $passed = !empty($results) && count(array_filter($results, fn($r) => !$r['pass'])) === 0;

        return ['passed' => $passed, 'results' => $results, 'output' => $output];
    }

    private static function stripOpenTag(string $code): string
    {
        return preg_replace('/^\s*<\?php\s*/i', '', $code);
    }
}
