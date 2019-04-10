<?php

namespace Primestyle\Sumibi\Rules;

class NameKatakana
{
    public function invoke(string $value): bool
    {
        return preg_match('/[^ァ-ヶー 　]/u', $value);
    }
}
