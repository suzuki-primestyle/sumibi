<?php
namespace Primestyle\Sumibi\Traits;

trait FailedTrait {
    public function failed($value): bool
    {
        return !$this->valid($value);
    }
}
