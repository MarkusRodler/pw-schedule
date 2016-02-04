<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use DateTimeImmutable;
use RangeException;

final class ScheduleDate
{
    /**
     * @var DateTimeImmutable
     */
    private $startDate;
 
    /**
     * @var DateTimeImmutable
     */
    private $endDate;
 
    public function __construct(DateTimeImmutable $startDate, DateTimeImmutable $endDate)
    {
        $this->ensureStartDateIsBeforeEndDate($startDate, $endDate);

        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getEndDate(): DateTimeImmutable
    {
        return $this->endDate;
    }
    
    public function equals(ScheduleDate $scheduleDate): bool
    {
        return ($scheduleDate->getStartDate()== $this->startDate 
            && $scheduleDate->getEndDate() == $this->endDate);
    }

    private function ensureStartDateIsBeforeEndDate(DateTimeImmutable $startDate, DateTimeImmutable $endDate)
    {
        if ($endDate < $startDate) {
            throw new RangeException('Startdate can not be after Enddate');
        }
    }
}