<?php

namespace Primestyle\Sumibi\Rules;

use Primestyle\Sumibi\Traits\FailedTrait;

class Required
{
    use FailedTrait;
    /**
     * check if a value is not empty.
     *
     * @param mixed $value
     * @return bool
     */
    public function valid($value): bool
    {
        if ($value === null) return false;
        if ($value === '') return false;
        if (is_iterable($value) && count($value) === 0 ) return false;

        return true;
    }
}
