<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use DateTimeImmutable;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Dark\PW\Schedule\Schedule
 * @uses \Dark\PW\Schedule\ScheduleName
 */
class ScheduleTest extends PHPUnit_Framework_TestCase
{

    public function testScheduleWithValidNameCanBeCreated()
    {
        $scheduleName = new ScheduleName('schedule name');
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $room = new Room('My Room');
        
        $schedule = new Schedule($scheduleName, $scheduleDate, $room);

        $this->assertSame('schedule name', $schedule->getName());
        $this->assertSame('My Room', $schedule->getRoom()->getName());
        $this->assertSame($scheduleDate, $schedule->getDate());
    }

    public function testUsersCanAttendSchedule()
    {
        $scheduleName = new ScheduleName('schedule name');
        $startDate = new DateTimeImmutable('2016-01-01');
        $endDate = new DateTimeImmutable('2016-01-02');
        $scheduleDate = new ScheduleDate($startDate, $endDate);
        $room = new Room('My Room');
        $schedule = new Schedule($scheduleName, $scheduleDate, $room);
        $nickname = new UserNickname('nick');
        $email = new UserEmail('mail@mail.de');
        $user = new User($nickname, $email);
        $nickname2 = new UserNickname('nick2');
        $email2 = new UserEmail('mail2@mail.de');
        $user2 = new User($nickname2, $email2);
        
        $schedule->addUser($user);
        $schedule->addUser($user2);
        
        $this->assertCount(2, $schedule->getAttendees());
        $this->assertContains($user, $schedule->getAttendees());
        $this->assertContains($user2, $schedule->getAttendees());
    }

}