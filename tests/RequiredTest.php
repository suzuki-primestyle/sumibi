<?php

namespace Primestyle\Sumibi\Test;

use PHPUnit\Framework\TestCase;

use Primestyle\Sumibi\Sumibi;

class RequiredTest extends TestCase
{
    public function testNullValue()
    {
        $v = new Sumibi();
        $data = ['name' => null];
        $rules = ['name' => 'required'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 1);
        $this->assertEquals($result->toArray()['name'][0], 'This field is required.');
    }
    public function testEmptyStringValue()
    {
        $v = new Sumibi();
        $data = ['name' => ''];
        $rules = ['name' => 'required'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['name']), 1);
    }
    public function testEmptyArray()
    {
        $v = new Sumibi();
        $data = ['names' => []];
        $rules = ['names' => 'required'];
        $result = $v->validate($data, $rules);

        $this->assertEquals(count($result->toArray()['names']), 1);
    }
}
