<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use PHPUnit_Framework_TestCase;
use InvalidArgumentException;

/**
 * @covers \Dark\PW\Schedule\Room
 */
class RoomTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCannotBeEmpty()
    {
        new Room('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCannotContainOnlySpaces()
    {
        new Room('   ');
    }

    public function testNameCanBeRetrieved()
    {
        $room = new Room('Test Name');

        $this->assertSame('Test Name', $room->getName());
    }

    public function testWhitespacesWillBeTrimmed()
    {
        $room = new Room('  Test Name  ');

        $this->assertSame('Test Name', $room->getName());
    }

}