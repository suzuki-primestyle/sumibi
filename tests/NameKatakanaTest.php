<?php

namespace Primestyle\Sumibi\Test;

use PHPUnit\Framework\TestCase;

use Primestyle\Sumibi\Sumibi;

class NameKatakanaTest extends TestCase
{
    public function testValidNameKatakana()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナ'];
        $rules = ['name' => 'name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result), 0);
    }
    public function testInvalidNameKatakana()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナではない'];
        $rules = ['name' => 'name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result), 1);
    }
    public function testValidNameKatakanaWithZenkakuSpace()
    {
        $v = new Sumibi();
        $data = ['name' => 'ヤマダ　タロウ'];
        $rules = ['name' => 'name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result), 0);
    }
}
