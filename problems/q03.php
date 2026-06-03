<?php
return [
    'id'      => 'q03',
    'type'    => 'choice',
    'level'   => '初級',
    'genre'   => 'PHP基礎知識',
    'title'   => 'Nullsafe 演算子',
    'question'=> '次のコードの実行結果として正しいものはどれですか？

<?php
class User {
    public ?Address $address = null;
}
class Address {
    public string $city = "Kobe";
}

$user = new User();
echo $user?->address?->city ?? "不明";',
    'choices' => [
        'A' => '"Kobe" と表示される',
        'B' => '"不明" と表示される',
        'C' => 'null と表示される',
        'D' => 'TypeError がスローされる',
    ],
    'correct' => 'B',
    'explanation' => '$user->address は null なので、?-> チェーンの途中で null が返ります。?? 演算子で "不明" にフォールバックします。',
];
