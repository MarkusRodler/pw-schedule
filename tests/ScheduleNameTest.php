<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

/**
 * @covers \Dark\PW\Schedule\ScheduleName
 */
class ScheduleNameTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotBeEmpty()
    {
        new ScheduleName('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotContainOnlySpaces()
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