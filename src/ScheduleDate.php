<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

class ScheduleDate
{
    /**
     * @var \DateTime
     */
    private $startDate;
 
    /**
     * @var \DateTime
     */
    private $endDate;
 
    public function __construct(\DateTime $startDate, \DateTime $endDate)
    {
        $this->ensureStartDateIsBeforeEndDate($startDate, $endDate);

        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    private function ensureStartDateIsBeforeEndDate(\DateTime $startDate, \DateTime $endDate)
    {
        if ($endDate < $startDate) {
            throw new \RangeException('Startdate can not be after Enddate');
        }
    }
}