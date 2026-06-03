# PHP 8.3 練習問題集

PHP 8.3.9の練習環境です。

## 動作環境

- Docker Desktop（または Docker Engine + Docker Compose）
- ブラウザ（Chrome / Firefox / Safari）

---

## セットアップ

```bash
# 1. このディレクトリで起動
tug up -d

# 2. ブラウザでアクセス
open http://app.php-practice.localhost
```

---

## 使い方

### Web UI（ブラウザ）

`http://app.php-practice.localhost` を開くと問題一覧が表示されます。

| 操作 | 説明 |
|------|------|
| 左サイドバー | 問題一覧・フィルタ（レベル・ジャンル・種類） |
| 「実行する」ボタン | コードを実行してサンプル入力ごとの出力を確認（コーディング問題のみ） |
| 「採点する」ボタン | 解答を送信して即採点 |
| 「ヒントを見る」 | ヒントの表示/非表示 |
| 「リセット」 | 入力内容をスタータコードに戻す |
| 上部プログレスバー | 全問中の正解数を表示 |

### 問題の種類

| 種類 | 説明 |
|------|------|
| **選択問題** | A〜D から正解を選ぶ |
| **記述式** | キーワードが含まれているかを採点 |
| **コーディング** | PHP コードを書いて自動テスト実行 |

---

## CLI テストランナー

Docker コンテナの中で直接テストを実行することもできます。

```bash
# コンテナに入る
docker compose exec app bash

# 全問テスト実行
php run_tests.php

# 特定の問題だけ実行
php run_tests.php q08
```

---

## 問題の追加方法

`problems/` ディレクトリに PHP ファイルを追加するだけで自動的に読み込まれます。

### 選択問題

```php
<?php
return [
    'id'      => 'q99',
    'type'    => 'choice',
    'level'   => '初級',          // 初級 / 中級 / 上級
    'genre'   => 'PHP基礎知識',
    'title'   => '問題タイトル',
    'question'=> '問題文...',
    'choices' => [
        'A' => '選択肢A',
        'B' => '選択肢B',
        'C' => '選択肢C',
        'D' => '選択肢D',
    ],
    'correct'     => 'B',         // 正解の選択肢キー
    'explanation' => '解説文...',
];
```

### 記述式問題

```php
<?php
return [
    'id'       => 'q99',
    'type'     => 'text',
    'level'    => '中級',
    'genre'    => 'クラス・OOP',
    'title'    => '問題タイトル',
    'question' => '問題文...',
    'keywords' => ['キーワード1', 'キーワード2'],  // すべて含まれていると正解
    'accepted_answers' => ['完全一致の正解文字列'],  // 任意
    'explanation'  => '解説文...',
    'model_answer' => '模範解答...',
];
```

### コーディング問題

```php
<?php
return [
    'id'      => 'q99',
    'type'    => 'coding',
    'level'   => '上級',
    'genre'   => 'アルゴリズム',
    'title'   => '問題タイトル',
    'question'=> '問題文...',
    'examples'=> [
        [
            'input'       => '入力例（関数呼び出し式 or 値）',
            'input_label' => '変数名 = 値（表示用ラベル）',
            'output'      => '出力例',
            'explanation' => '例の説明（任意）',
        ],
    ],
    'constraints' => [
        '制約条件1',  // 任意
    ],
    'starter' => '<?php
declare(strict_types=1);

function myFunc(): void
{
    // ここに実装
}
',
    'hint'    => 'ヒントテキスト',
];
```

テストファイルを `tests/q99_test.php` に作成します（`PASS:` / `FAIL:` プレフィックス形式）：

```php
<?php
require_once __DIR__ . '/_helper.php';

assert_eq(期待値, myFunc(引数), 'テストケース説明');
assert_true(myFunc() === true, 'bool テスト');
```

---

## ディレクトリ構成

```
php-quiz/
├── docker/
│   ├── Dockerfile        # PHP 8.3.9-apache
│   ├── apache.conf
│   └── php.ini
├── public/
│   ├── index.php         # メインHTML
│   ├── css/style.css
│   ├── js/app.js
│   └── api/
│       ├── problems.php  # 問題一覧API
│       ├── judge.php     # 採点API
│       └── run.php       # コード実行API（サンプル入力の出力確認）
├── problems/             # 問題定義ファイル（q01.php〜）
├── tests/                # テストファイル（q08_test.php〜）
│   └── _helper.php       # assert_eq / assert_true ヘルパー
├── src/
│   ├── ProblemLoader.php # 問題の読み込み
│   └── Judge.php         # 採点エンジン
├── run_tests.php         # CLI テストランナー
└── docker-compose.yml
```

---

## 収録問題一覧

| ID | タイトル | 種類 | レベル | ジャンル |
|----|---------|------|--------|---------|
| q01 | match式の特徴 | 選択 | 初級 | PHP基礎知識 |
| q02 | readonlyプロパティ | 選択 | 初級 | PHP基礎知識 |
| q03 | Nullsafe演算子 | 選択 | 初級 | PHP基礎知識 |
| q04 | array_map/filter | 選択 | 初級 | PHP基礎知識 |
| q05 | strict_types の役割 | 記述 | 初級 | PHP基礎知識 |
| q06 | WHERE と HAVING の違い | 記述 | 初級 | SQL |
| q07 | interface vs abstract | 記述 | 中級 | クラス・OOP |
| q08 | 文字列の逆順 | コード | 初級 | 文字列操作 |
| q09 | FizzBuzz | コード | 初級 | アルゴリズム |
| q10 | 配列の重複除去 | コード | 初級 | 配列操作 |
| q11 | 回文判定 | コード | 初級 | 文字列操作 |
| q12 | フィボナッチ（再帰） | コード | 中級 | 再帰 |
| q13 | 二分探索 | コード | 中級 | アルゴリズム |
| q14 | スタッククラス | コード | 中級 | クラス・OOP |
| q15 | コインの組み合わせ（DP） | コード | 上級 | 動的計画法 |
| q16 | Enum ステータス管理 | コード | 中級 | PHP 8.x 新機能 |
| q17 | PHP 8 の文字列検索関数 | 選択 | 初級 | 文字列操作 |
| q18 | array_flip() の重複値の挙動 | 選択 | 初級 | 配列操作 |
| q19 | intdiv() の動作 | 選択 | 初級 | 数学・数値 |
| q20 | usort() とスペースシップ演算子 | 選択 | 初級 | ソート |
| q21 | 文字列の切り詰め（mb_ 関数） | コード | 初級 | 文字列操作 |
| q22 | 価格フィルタと割引適用 | コード | 初級 | 配列操作 |
| q23 | 最長の単語を探す（array_reduce） | コード | 初級 | 配列操作 |
| q24 | スネークケース → キャメルケース変換 | コード | 初級 | 文字列操作 |
| q25 | 複合条件ソート（usort） | コード | 中級 | ソート |
| q26 | 括弧の対応チェック（SplStack） | コード | 中級 | SPLデータ構造 |
| q27 | ページネーション（array_chunk） | コード | 初級 | 配列操作 |
| q28 | k 番目に小さい値（SplMinHeap） | コード | 中級 | SPLデータ構造 |
