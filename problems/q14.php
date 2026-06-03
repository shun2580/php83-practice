<?php
return [
    'id'      => 'q14',
    'type'    => 'coding',
    'level'   => '中級',
    'genre'   => 'クラス・OOP',
    'title'   => 'スタッククラス',
    'question'=> '以下のメソッドを持つ Stack クラスを実装してください。
・push(mixed $val): void  — 値を末尾に追加
・pop(): mixed            — 末尾の値を取り出す（空なら null）
・peek(): mixed           — 末尾の値を参照（取り出さない、空なら null）
・isEmpty(): bool         — スタックが空なら true
・size(): int             — 要素数を返す',
    'examples'=> [
        ['input' => 'push(1),push(2),push(3),pop()', 'input_label' => 'push(1), push(2), push(3), pop()', 'output' => '3', 'explanation' => '後入れ先出しのため最後に push した 3 が取り出される。'],
        ['input' => 'push(5),peek()',                'input_label' => 'push(5), peek()',                  'output' => '5（取り出さない）', 'explanation' => 'peek() は値を取り出さずに末尾の値を参照する。'],
    ],
    'constraints' => [],
    'starter' => '<?php
declare(strict_types=1);

class Stack
{
    private array $items = [];

    public function push(mixed $val): void
    {
        // 実装
    }

    public function pop(): mixed
    {
        // 実装
    }

    public function peek(): mixed
    {
        // 実装
    }

    public function isEmpty(): bool
    {
        // 実装
    }

    public function size(): int
    {
        // 実装
    }
}
',
    'hint'    => 'array_pop() で取り出し、end() で末尾参照、empty() で空チェックができます。',
];
