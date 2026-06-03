<?php
return [
    'id'       => 'q06',
    'type'     => 'text',
    'level'    => '初級',
    'genre'    => 'SQL',
    'title'    => 'WHERE と HAVING の違い',
    'question' => 'SQL において WHERE 句と HAVING 句の違いを説明してください。\nそれぞれどのタイミングでフィルタリングが行われるかに触れてください。',
    'keywords' => ['集計', 'GROUP BY'],
    'accepted_answers' => [],
    'explanation' => 'WHERE は GROUP BY や集計関数の実行前に行をフィルタします。HAVING は GROUP BY と集計の後に、グループに対してフィルタを適用します。',
    'model_answer' => 'WHERE はグループ化・集計の前に行を絞り込みます。HAVING は GROUP BY による集計後にグループを絞り込むために使います。SUM や COUNT などの集計関数の結果でフィルタしたい場合は HAVING を使います。',
];
