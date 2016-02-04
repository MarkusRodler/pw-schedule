<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

/**
 * @covers \Dark\PW\Schedule\Scheduler
 */
class SchedulerTest extends \PHPUnit_Framework_TestCase
{

    public function testRoomCanBeAdded()
    {
        $scheduler = new Scheduler();
        $room = new Room('My Room');
        
        $scheduler->addRoom($room);
        
        $this->assertCount(1, $scheduler->getRooms());
        $this->assertContains($room, $scheduler->getRooms());
    }

    public function testScheduleCanBeAdded()
    {
        $scheduler = new Scheduler();
        $room = new Room('My Room');
        $scheduler->addRoom($room);
        $scheduleName = new ScheduleName('schedule name');
        $startDate = new \DateTimeImmutable('2016-01-01');
        $endDate = new \DateTimeImmutable('2016-01-02');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $schedule = new Schedule($scheduleName, $scheduleDate, $room);
        
        $scheduler->addSchedule($schedule);
        
        $this->assertCount(1, $scheduler->getSchedules());
        $this->assertContains($schedule, $scheduler->getSchedules());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Room Unknown
     */
    public function testScheduleCanOnlyBeAddedWithRoomFromScheduler()
    {
        $scheduler = new Scheduler();
        $room = new Room('My Room');
        $evilRoom = new Room('My Room');
        $scheduler->addRoom($room);
        $scheduleName = new ScheduleName('schedule name');
        $startDate = new \DateTimeImmutable('2016-01-01');
        $endDate = new \DateTimeImmutable('2016-01-02');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $schedule = new Schedule($scheduleName, $scheduleDate, $evilRoom);
        
        $scheduler->addSchedule($schedule);
    }

}