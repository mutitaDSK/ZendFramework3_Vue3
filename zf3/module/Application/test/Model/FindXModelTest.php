<?php
/**
 * Find value form position
 * Input: position as int
 * Output: value of input position as int
 * Process: position^2 - position + 3 otherwise if position is not integer, value will be 0
 */

namespace ApplicationTest\Model;

use Application\Model\ValueOfPosition;
use PHPUnit\Framework\TestCase;


class FindXModelTest extends TestCase
{
    public function testValueOfPosition1()
    {
        $value = new ValueOfPosition();

        $this->assertSame(3, $value->find(1));
    }

    public function testValueOfPosition2()
    {
        $value = new ValueOfPosition();

        $this->assertSame(5, $value->find(2));
    }

    public function testValueOfPosition3()
    {
        $value = new ValueOfPosition();

        $this->assertSame(9, $value->find(3));
    }

    public function testValueOfPosition4()
    {
        $value = new ValueOfPosition();

        $this->assertSame(15, $value->find(4));
    }

    public function testValueOfPosition5()
    {
        $value = new ValueOfPosition();

        $this->assertSame(23, $value->find(5));
    }

    public function testValueOfPositionIsString()
    {
        $value = new ValueOfPosition();

        $this->assertSame(0, $value->find("1"));
    }
}