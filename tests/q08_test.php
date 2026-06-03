<?php
require_once __DIR__ . '/_helper.php';

assert_eq('olleh', reverseString('hello'),  ' "hello" → "olleh"');
assert_eq('PHP',   reverseString('PHP'),    ' "PHP" → "PHP"');
assert_eq('edcba', reverseString('abcde'),  ' "abcde" → "edcba"');
assert_eq('a',     reverseString('a'),      ' 1文字はそのまま');
assert_eq('',      reverseString(''),       ' 空文字列');
