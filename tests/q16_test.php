<?php
require_once __DIR__ . '/_helper.php';

assert_eq('受付待ち', OrderStatus::PENDING->label(),    'PENDINGのラベル');
assert_eq('処理中',   OrderStatus::PROCESSING->label(), 'PROCESSINGのラベル');
assert_eq('発送済み', OrderStatus::SHIPPED->label(),    'SHIPPEDのラベル');
assert_eq('配達完了', OrderStatus::DELIVERED->label(),  'DELIVEREDのラベル');
assert_eq('キャンセル', OrderStatus::CANCELLED->label(),'CANCELLEDのラベル');

$next = OrderStatus::PENDING->nextStates();
assert_true(in_array(OrderStatus::PROCESSING, $next, true), 'PENDING→PROCESSINGへ遷移可');
assert_true(in_array(OrderStatus::CANCELLED,  $next, true), 'PENDING→CANCELLEDへ遷移可');

assert_eq([], OrderStatus::DELIVERED->nextStates(),  'DELIVEREDからは遷移なし');
assert_eq([], OrderStatus::CANCELLED->nextStates(),  'CANCELLEDからは遷移なし');

assert_eq('shipped', OrderStatus::SHIPPED->value,    'Backed Enum の value');
assert_eq(OrderStatus::SHIPPED, OrderStatus::from('shipped'), 'from()でインスタンス生成');
