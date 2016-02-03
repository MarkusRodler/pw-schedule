<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

class Schedule
{
    /**
     * @var ScheduleName
     */
    private $scheduleName;

    /**
     * @var ScheduleDate
     */
    private $scheduleDate;

    /**
     * @var Room
     */
    private $room;

    /**
     * @var \SplObjectStorage
     */
    private $attendees;


    public function __construct(ScheduleName $name, ScheduleDate $date, Room $room)
    {
        $this->scheduleName = $name;
        $this->scheduleDate = $date;
        $this->room = $room;
        $this->attendees = new \SplObjectStorage();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->scheduleName->getName();
    }

    /**
     * @return ScheduleDate
     */
    public function getDate(): ScheduleDate
    {
        return $this->scheduleDate;
    }

    /**
     * @return Room
     */
    public function getRoom(): Room
    {
        return $this->room;
    }

    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->attendees->attach($user);
    }
    
    /**
     * @return \SplObjectStorage
     */
    public function getAttendees(): \SplObjectStorage
    {
        return $this->attendees;
    }

}