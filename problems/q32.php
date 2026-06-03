<?php
return [
    'id'      => 'q32',
    'type'    => 'coding',
    'level'   => '初級',
    'genre'   => '正規表現',
    'title'   => 'メールアドレスのバリデーション',
    'question'=> '文字列がメールアドレスとして有効かを判定する関数 isValidEmail() を preg_match() で実装してください。
有効な条件: ローカル部@ドメイン.TLD（TLD は英字2文字以上）',
    'examples'=> [
        ['input' => '"user@example.com"',              'input_label' => '"user@example.com"',              'output' => 'true'],
        ['input' => '"invalid-email"',                  'input_label' => '"invalid-email"',                  'output' => 'false'],
        ['input' => '"a@b.c"',                          'input_label' => '"a@b.c"',                          'output' => 'false', 'explanation' => 'TLD が1文字のため無効'],
        ['input' => '"user.name+tag@sub.domain.co.jp"', 'input_label' => '"user.name+tag@sub.domain.co.jp"', 'output' => 'true'],
    ],
    'constraints' => [
        'ローカル部: 英数字・ . ・+ ・- ・_ を含む1文字以上',
        'ドメイン: 英数字とハイフン・ドット区切り',
        'TLD: 英字2文字以上',
    ],
    'starter' => '<?php
declare(strict_types=1);

function isValidEmail(string $email): bool
{
    // preg_match() で実装
}
',
    'hint' => '/^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ というパターンが参考になります。',
];
