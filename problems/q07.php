<?php
return [
    'id'       => 'q07',
    'type'     => 'text',
    'level'    => '中級',
    'genre'    => 'クラス・OOP',
    'title'    => 'インターフェースと抽象クラスの使い分け',
    'question' => 'PHP における interface と abstract class の違いと、\nそれぞれをどのような場面で使い分けるか説明してください。',
    'keywords' => ['インターフェース', '抽象'],
    'accepted_answers' => [],
    'explanation' => 'interface は実装を持てずメソッドのシグネチャのみ定義します。多重実装可能。abstract class は一部のメソッドに実装を持てますが単一継承のみ。「何ができるか」の契約にはinterface、「共通の処理」を持たせたい基底クラスにはabstract classを使います。',
    'model_answer' => 'interface はメソッドのシグネチャ（契約）のみ定義し、複数 implement できます。「このクラスは○○できる」という能力を表すのに使います。abstract class は共通の実装を持てますが単一継承のみです。共通処理を基底クラスに持たせたい場合に使います。',
];
