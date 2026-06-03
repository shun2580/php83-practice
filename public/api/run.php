<?php
declare(strict_types=1);

require_once __DIR__ . '/../../src/ProblemLoader.php';

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

$body = json_decode(file_get_contents('php://input'), true);
if (!$body || !isset($body['code'])) {
    http_response_code(400);
    echo json_encode(['error' => 'code が必要です']);
    exit;
}

$code = (string) $body['code'];
$problem = null;
if (isset($body['id']) && is_string($body['id'])) {
    $problem = ProblemLoader::find($body['id']);
}

// 危険な関数チェック
$danger = ['exec', 'system', 'shell_exec', 'passthru', 'proc_open', 'popen',
           'file_put_contents', 'file_get_contents', 'fopen', 'unlink', 'rmdir', 'mkdir',
           'eval', 'assert', 'curl_exec', 'curl_init'];
foreach ($danger as $fn) {
    if (preg_match('/\b' . preg_quote($fn, '/') . '\s*\(/i', $code)) {
        echo json_encode([
            'output'   => "禁止関数 {$fn}() は使用できません",
            'hasError' => true,
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

$tmp = tempnam(sys_get_temp_dir(), 'run_') . '.php';
$php = "<?php\ndeclare(strict_types=1);\n" . stripOpenTag($code);
if (is_array($problem) && ($problem['type'] ?? '') === 'coding' && !empty($problem['examples'])) {
    $php .= "\n" . buildExampleRunner($problem, $code);
}
file_put_contents($tmp, $php);

$lines  = [];
$retval = 0;
exec('/usr/bin/timeout 5 /usr/local/bin/php -d display_errors=On ' . escapeshellarg($tmp) . ' 2>&1', $lines, $retval);
@unlink($tmp);

$output = implode("\n", $lines);

echo json_encode([
    'output'   => $output === '' ? '(出力なし)' : $output,
    'hasError' => $retval !== 0,
], JSON_UNESCAPED_UNICODE);

function stripOpenTag(string $code): string
{
    return preg_replace('/^\s*<\?php\s*/i', '', $code);
}

function buildExampleRunner(array $problem, string $code): string
{
    $examples = $problem['examples'] ?? [];
    $functionName = extractFunctionName($code) ?? extractFunctionName((string) ($problem['starter'] ?? ''));
    $lines = [
        'function __practice_format(mixed $value): string {',
        '    if (is_bool($value)) return $value ? "true" : "false";',
        '    if (is_string($value)) return var_export($value, true);',
        '    if ($value instanceof UnitEnum) return $value->name;',
        '    if (is_array($value)) return "[" . implode(", ", array_map("__practice_format", $value)) . "]";',
        '    return var_export($value, true);',
        '}',
        '',
    ];

    foreach ($examples as $example) {
        if (empty($example['input']) || !is_string($example['input'])) {
            continue;
        }
        $input = $example['input'];
        $expression = buildExpression((string) $problem['id'], $input, $functionName);
        if ($expression === null) {
            continue;
        }
        $lines[] = 'echo "入力: ' . addcslashes($input, "\\\"") . '\\n";';
        $lines[] = 'ob_start();';
        $lines[] = '$__practice_result = ' . $expression . ';';
        $lines[] = '$__practice_debug = ob_get_clean();';
        $lines[] = 'if ($__practice_debug !== "") echo "途中出力:\\n" . $__practice_debug;';
        $lines[] = 'echo "戻り値: " . __practice_format($__practice_result) . "\\n\\n";';
    }

    return implode("\n", $lines);
}

function extractFunctionName(string $code): ?string
{
    if (preg_match('/\bfunction\s+([a-zA-Z_][a-zA-Z0-9_]*)\s*\(/', $code, $matches)) {
        return $matches[1];
    }
    return null;
}

function buildExpression(string $problemId, string $input, ?string $functionName): ?string
{
    if ($problemId === 'q14') {
        return match ($input) {
            'push(1),push(2),push(3),pop()' => '(function () { $s = new Stack(); $s->push(1); $s->push(2); $s->push(3); return $s->pop(); })()',
            'push(5),peek()' => '(function () { $s = new Stack(); $s->push(5); return $s->peek(); })()',
            default => null,
        };
    }

    if (preg_match('/^[A-Za-z_][A-Za-z0-9_\\\\]*(?:::|->|\s*\()/', $input)) {
        return $input;
    }

    if ($functionName === null) {
        return null;
    }

    return $functionName . '(' . $input . ')';
}
