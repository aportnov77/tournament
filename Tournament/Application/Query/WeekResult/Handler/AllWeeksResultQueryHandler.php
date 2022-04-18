<?php

namespace Tournament\Application\Query\WeekResult\Handler;

use Tournament\Application\Query\WeekResult\AllWeeksResultQuery;

class AllWeeksResultQueryHandler
{
    private WeekResultRepositoryInterface $weekResultRepository;

    /**
     * @param WeekResultRepositoryInterface $weekResultRepository
     */
    public function __construct(WeekResultRepositoryInterface $weekResultRepository)
    {
        $this->weekResultRepository = $weekResultRepository;
    }

    public function __invoke(AllWeeksResultQuery $query)
    {
        return $this->weekResultRepository->getAllWeeksResult($query->getWeekUuid());
    }

}
