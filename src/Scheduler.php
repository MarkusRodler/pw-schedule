<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use InvalidArgumentException;
use SplObjectStorage;

class Scheduler
{
    /**
     * @var SplObjectStorage
     */
    private $rooms;

    /**
     * @var SplObjectStorage
     */
    private $schedules;

    public function __construct()
    {
        $this->rooms = new SplObjectStorage();
        $this->schedules = new SplObjectStorage();
    }


    /**
     * @param Room $room
     */
    public function addRoom(Room $room)
    {
        $this->rooms->attach($room);
    }
    
    /**
     * @return SplObjectStorage
     */
    public function getRooms(): SplObjectStorage
    {
        return $this->rooms;
    }

    /**
     * @param Schedule $schedule
     */
    public function addSchedule(Schedule $schedule)
    {
        $this->ensureRoomIsKnown($schedule->getRoom());
        
        $this->schedules->attach($schedule);
    }
    
    /**
     * @return SplObjectStorage
     */
    public function getSchedules(): SplObjectStorage
    {
        return $this->schedules;
    }
    
    /**
     * @param Room $room
     * @throws InvalidArgumentException
     */
    private function ensureRoomIsKnown(Room $room)
    {
        if (!$this->rooms->contains($room)) {
            throw new InvalidArgumentException('Room Unknown');
        }
    }

}