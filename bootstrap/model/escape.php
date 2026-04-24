<?php

// XSS対策
function h($str)
{
    // 強制的に文字列にキャスト
    // 'も含めて対策
    return htmlspecialchars((string) $str, ENT_QUOTES, 'UTF-8');
}
