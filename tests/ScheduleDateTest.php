<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use DateTimeImmutable;
use PHPUnit_Framework_TestCase;
use RangeException;

/**
 * @covers \Dark\PW\Schedule\ScheduleDate
 */
class ScheduleDateTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException RangeException
     * @expectedExceptionMessage Startdate can not be after Enddate
     */
    public function testStartDateCannotBeAfterEndDate()
    {
        $startDate = new DateTimeImmutable('2016-01-02');
        $endDate = new DateTimeImmutable('2016-01-01');

        new ScheduleDate($startDate, $endDate);
    }

    public function testStartDateCanBeRetrieved()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');

        $scheduleDate = new ScheduleDate($startDate, $endDate);

        $this->assertEquals($startDate, $scheduleDate->getStartDate());
    }

    public function testEndDateCanBeRetrieved()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');

        $scheduleDate = new ScheduleDate($startDate, $endDate);

        $this->assertEquals($endDate, $scheduleDate->getEndDate());
    }

    public function testScheduleDatesWithSameDateTimesAreEqual()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $startDate2 = new DateTimeImmutable('2016-01-01');
        $endDate2 = new DateTimeImmutable('2016-01-02');
        $scheduleDate2 = new ScheduleDate($startDate2, $endDate2);

        $this->assertTrue($scheduleDate->equals($scheduleDate2));
    }

    public function testScheduleDatesWithDifferentStartDateAreNotEqual()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $startDate2 = new DateTimeImmutable('2016-01-02');
        $endDate2 = new DateTimeImmutable('2016-01-02');
        $scheduleDate2 = new ScheduleDate($startDate2, $endDate2);

        $this->assertFalse($scheduleDate->equals($scheduleDate2));
    }

    public function testScheduleDatesWithDifferenEndDateAreNotEqual()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-01');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $startDate2 = new DateTimeImmutable('2016-01-01');
        $endDate2 = new DateTimeImmutable('2016-01-02');
        $scheduleDate2 = new ScheduleDate($startDate2, $endDate2);

        $this->assertFalse($scheduleDate->equals($scheduleDate2));
    }
    
    public function testStartDateCannotBeModified()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');

        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $scheduleDate2 = new ScheduleDate(new DateTimeImmutable('2016-01-01'), new DateTimeImmutable('2016-01-02'));
        $startDate->setDate(2000, 1, 1);

        $this->assertTrue($scheduleDate->equals($scheduleDate2));
    }
    
    public function testEndDateCannotBeModified()
    {
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');

        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $scheduleDate2 = new ScheduleDate(new DateTimeImmutable('2016-01-01'), new DateTimeImmutable('2016-01-02'));
        $endDate->setDate(2000, 1, 1);

        $this->assertTrue($scheduleDate->equals($scheduleDate2));
    }
}