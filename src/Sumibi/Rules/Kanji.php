<?php

namespace Primestyle\Sumibi\Rules;

use Primestyle\Sumibi\Traits\FailedTrait;

class Kanji
{
    use FailedTrait;
    /**
     * check if a value is Kanji.
     *
     * @param string $value
     * @return bool
     */
    public function valid($value): bool
    {
        if (!is_string($value)) return false;
        $regex = "/^[\x{3005}\x{3007}\x{303b}\x{3400}-\x{9FFF}\x{F900}-\x{FAFF}\x{20000}-\x{2FFFF}]+$/u";
        return preg_match($regex, $value) === 1;
    }
}
