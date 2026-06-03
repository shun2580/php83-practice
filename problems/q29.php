<?php
return [
    'id'      => 'q29',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => 'PHP 8.x 新機能',
    'title'   => '名前付き引数（Named Arguments）',
    'question'=> '以下のコードの出力として正しいものはどれですか？

function createUser(string $name, int $age = 0, bool $admin = false): string {
    return "{$name},{$age}," . ($admin ? "true" : "false");
}

echo createUser(age: 25, admin: true, name: "Alice");',
    'choices' => [
        'A' => 'Alice,25,true',
        'B' => ',0,false（引数の順序が違うためデフォルト値が使われる）',
        'C' => 'エラーになる（順序通りに引数を渡さなければならない）',
        'D' => '25,Alice,true',
    ],
    'correct' => 'A',
    'explanation' => 'PHP 8.0 で導入された名前付き引数（Named Arguments）では、引数名: 値 の形式で順序に関係なく引数を渡せます。age: 25, admin: true, name: "Alice" と渡しているため $name="Alice", $age=25, $admin=true となり、"Alice,25,true" が出力されます。',
];
