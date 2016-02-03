<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

/**
 * @covers \Dark\PW\Schedule\Room
 */
class RoomTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotBeEmpty()
    {
        new Room('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotContainOnlySpaces()
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