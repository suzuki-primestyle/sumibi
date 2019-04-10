<?php

namespace Primestyle\Sumibi;

use Primestyle\Sumibi\Rulenames;
use Primestyle\Sumibi\Rules\{NameKatakana};

class Sumibi
{
    public function validate(array $data, array $rules): array
    {
        $message_bag = [];
        foreach ($data as $key => $value) {
            switch ($rules[$key]) {
                case Rulenames::NAME_KATAKANA():
                    if ((new NameKatakana())->invoke($value)) {
                        $message_bag[$key] = ['must be katakana name'];
                    }
            }
        }
        return $message_bag;
    }
}
