<?php

namespace Tournament\Application\Query\WeekResult\Handler;

use Tournament\Application\Query\WeekResult\WeekResultQuery;

class WeekResultQueryHandler
{
    private WeekResultRepositoryInterface $weekResultRepository;

    /**
     * @param WeekResultRepositoryInterface $weekResultRepository
     */
    public function __construct(WeekResultRepositoryInterface $weekResultRepository)
    {
        $this->weekResultRepository = $weekResultRepository;
    }

    public function __invoke(WeekResultQuery $query)
    {
        return $this->weekResultRepository->getWeekResult($query->getWeekNumber());
    }

}
