<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

/**
 * @covers \Dark\PW\Schedule\ScheduleDate
 */
class ScheduleDateTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException RangeException
     * @expectedExceptionMessage Startdate can not be after Enddate
     */
    public function testStartDateCanNotBeAfterEndDate()
    {
        $startDate = new \DateTime('2016-01-02');
        $endDate = new \DateTime('2016-01-01');
        
        new ScheduleDate($startDate, $endDate);
    }

    public function testStartDateCanBeRetrieved()
    {
        $startDate = new \DateTime('2016-01-01');
        $endDate = new \DateTime('2016-01-02');
        
        $scheduleDate = new ScheduleDate($startDate, $endDate);

        $this->assertSame($startDate, $scheduleDate->getStartDate());
    }

    public function testEndDateCanBeRetrieved()
    {
        $startDate = new \DateTime('2016-01-01');
        $endDate = new \DateTime('2016-01-02');
        
        $scheduleDate = new ScheduleDate($startDate, $endDate);

        $this->assertSame($endDate, $scheduleDate->getEndDate());
    }

}