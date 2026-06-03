<?php
return [
    'id'      => 'q16',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'PHP 8.x 新機能',
    'title'   => 'Enum を使ったステータス管理',
    'question'=> 'PHP 8.1 の Backed Enum を使って OrderStatus を実装してください。
・case: PENDING, PROCESSING, SHIPPED, DELIVERED, CANCELLED（値は小文字英語）
・label(): string — 日本語ラベルを返す（受付待ち/処理中/発送済み/配達完了/キャンセル）
・nextStates(): array — 遷移可能な次のステータスを返す
  PENDING→[PROCESSING,CANCELLED], PROCESSING→[SHIPPED,CANCELLED],
  SHIPPED→[DELIVERED], DELIVERED→[], CANCELLED→[]',
    'examples'=> [
        ['input' => 'OrderStatus::PENDING->label()',          'input_label' => 'OrderStatus::PENDING->label()',          'output' => '"受付待ち"',          'explanation' => 'PENDING の日本語ラベルは「受付待ち」。'],
        ['input' => 'OrderStatus::PENDING->nextStates()',    'input_label' => 'OrderStatus::PENDING->nextStates()',     'output' => '[PROCESSING, CANCELLED]', 'explanation' => '受付待ちから遷移可能なのは処理中とキャンセル。'],
        ['input' => 'OrderStatus::from("shipped")->label()', 'input_label' => 'OrderStatus::from("shipped")->label()', 'output' => '"発送済み"',          'explanation' => 'backed value "shipped" から SHIPPED を取得してラベルを返す。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

enum OrderStatus: string
{
    case PENDING    = \'pending\';
    case PROCESSING = \'processing\';
    case SHIPPED    = \'shipped\';
    case DELIVERED  = \'delivered\';
    case CANCELLED  = \'cancelled\';

    public function label(): string
    {
        // 実装
    }

    /** @return OrderStatus[] */
    public function nextStates(): array
    {
        // 実装
    }
}
',
    'hint'    => 'match($this) を使って各 case ごとに値を返すとシンプルです。',
];
