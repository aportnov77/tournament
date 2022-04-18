<?php

namespace Tournament\Application\Query\Week\Handler;

use Tournament\Application\Query\Week\AllWeeksQuery;

class AllWeeksQueryHandler
{
    private WeekRepositoryInterface $weekRepository;

    /**
     * @param WeekRepositoryInterface $weekRepository
     */
    public function __construct(WeekRepositoryInterface $weekRepository)
    {
        $this->weekRepository = $weekRepository;
    }

    public function __invoke(AllWeeksQuery $query)
    {
        return $this->weekRepository->getAllWeeksAsAllWeekDTO($query->getTournamentUuid());
    }

}
