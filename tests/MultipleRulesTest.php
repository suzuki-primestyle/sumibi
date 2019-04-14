<?php

namespace Primestyle\Sumibi\Test;

use PHPUnit\Framework\TestCase;

use Primestyle\Sumibi\Sumibi;

class MultipleRulesTest extends TestCase
{
    public function testValid()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナ'];
        $rules = ['name' => 'full_name_katakana|required'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 0);
    }
    public function testFailedAtFirstRule()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナではない'];
        $rules = ['name' => 'full_name_katakana|required'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 1);
    }
    public function testFailedAtSecondRule()
    {
        $v = new Sumibi();
        $data = ['name' => 'カタカナではない'];
        $rules = ['name' => 'required|full_name_katakana'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 1);
    }
}
