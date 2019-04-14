<?php

namespace Primestyle\Sumibi\Rules;

class FullNameKatakana
{
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
    public function failed($value): bool
    {
        return !$this->valid($value);
    }
}
