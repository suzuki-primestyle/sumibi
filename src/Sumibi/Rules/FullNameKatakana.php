<?php

namespace Primestyle\Sumibi\Rules;

use Primestyle\Sumibi\Traits\FailedTrait;

class FullNameKatakana
{
    use FailedTrait;
    /**
     * check if value is katakana name. it allows to include hankaku/zenkaku spaces.
     *
     * @param [type] $value
     * @return boolean
     */
    public function valid($value): bool
    {
        if (!is_string($value)) return false;
        return preg_match('/^[ァ-ヶー 　]+$/u', $value) === 1;
    }
}
