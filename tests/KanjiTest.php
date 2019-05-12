<?php

namespace Primestyle\Sumibi\Test;

use PHPUnit\Framework\TestCase;

use Primestyle\Sumibi\Sumibi;

class KanjiTest extends TestCase
{
    public function testKanjiValue()
    {
        $v = new Sumibi();
        $data = ['name' => '山田太郎'];
        $rules = ['name' => 'kanji'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 0);
    }
    public function testKanjiWithHiraganaValue()
    {
        $v = new Sumibi();
        $data = ['name' => '山田たろう'];
        $rules = ['name' => 'kanji'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 1);
    }
    public function testKanjiWithRepeateLetter()
    {
        $v = new Sumibi();
        $data = ['name' => '佐々木太郎'];
        $rules = ['name' => 'kanji'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 0);
    }
}
