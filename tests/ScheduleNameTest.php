<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Dark\PW\Schedule\ScheduleName
 */
class ScheduleNameTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCannotBeEmpty()
    {
        new ScheduleName('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCannotContainOnlySpaces()
    {
        new ScheduleName('   ');
    }

    public function testNameCanBeRetrieved()
    {
        $scheduleName = new ScheduleName('Test Name');

        $this->assertSame('Test Name', $scheduleName->getName());
    }

    public function testWhitespacesWillBeTrimmed()
    {
        $scheduleName = new ScheduleName('  Test Name  ');

        $this->assertSame('Test Name', $scheduleName->getName());
    }

}