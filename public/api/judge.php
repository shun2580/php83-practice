<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../../src/ProblemLoader.php';
require_once __DIR__ . '/../../src/Judge.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

$body = json_decode(file_get_contents('php://input'), true);
if (!$body || empty($body['id']) || !isset($body['answer'])) {
    http_response_code(400);
    echo json_encode(['error' => 'id と answer が必要です']);
    exit;
}

$problem = ProblemLoader::find($body['id']);
if (!$problem) {
    http_response_code(404);
    echo json_encode(['error' => '問題が見つかりません']);
    exit;
}

$result = Judge::run($problem, (string) $body['answer']);
$result['explanation'] = $problem['explanation'] ?? null;
$result['model_answer'] = $problem['model_answer'] ?? null;

echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
