<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../../src/ProblemLoader.php';

$problems = array_map(function (array $p): array {
    // フロントへ渡す際にテスト答えなどは除外
    $safe = [
        'id'       => $p['id'],
        'type'     => $p['type'],
        'level'    => $p['level'],
        'genre'    => $p['genre'],
        'title'    => $p['title'],
        'question' => $p['question'],
    ];
    if ($p['type'] === 'choice') {
        $safe['choices'] = $p['choices'];
    }
    if ($p['type'] === 'coding') {
        $safe['examples']    = $p['examples'];
        $safe['constraints'] = $p['constraints'] ?? [];
        $safe['starter']     = $p['starter'];
        $safe['hint']        = $p['hint'] ?? '';
    }
    if ($p['type'] === 'text') {
        $safe['hint']         = $p['hint'] ?? '';
        $safe['model_answer'] = null; // 採点前は非公開
    }
    return $safe;
}, ProblemLoader::all());

echo json_encode([
    'problems' => $problems,
    'genres'   => ProblemLoader::genres(),
    'levels'   => ProblemLoader::levels(),
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
