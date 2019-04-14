<?php

namespace Primestyle\Sumibi\Test;

use PHPUnit\Framework\TestCase;

use Primestyle\Sumibi\Sumibi;

class FullNameKatakanaTest extends TestCase
{
    public function testValidFullNameKatakana()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナ'];
        $rules = ['name' => 'full_name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 0);
    }
    public function testInvalidFullNameKatakana()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナではない'];
        $rules = ['name' => 'full_name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 1);
    }
    public function testValidFullNameKatakanaWithZenkakuSpace()
    {
        $v = new Sumibi();
        $data = ['name' => 'ヤマダ　タロウ'];
        $rules = ['name' => 'full_name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 0);
    }
}
