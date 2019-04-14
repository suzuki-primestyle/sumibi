<?php

namespace Primestyle\Sumibi;

use MyCLabs\Enum\Enum;

class Rulenames extends Enum
{
    private const REQUIRED = 'required';
    private const HIRAGANA = 'hiragana';
    private const KATAKANA = 'katakana';
    private const KANJI = 'kanji';
    private const FULL_NAME_KATAKANA = 'full_name_katakana';
}
