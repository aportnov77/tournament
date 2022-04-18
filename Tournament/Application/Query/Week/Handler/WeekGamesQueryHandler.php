<?php

namespace Tournament\Application\Query\Week\Handler;

use Tournament\Application\Query\Week\WeekGamesQuery;

class WeekGamesQueryHandler
{
    private WeekRepositoryInterface $weekGamesRepositiry;

    /**
     * @param WeekRepositoryInterface $weekGamesRepositiry
     */
    public function __construct(WeekRepositoryInterface $weekGamesRepositiry)
    {
        $this->weekGamesRepositiry = $weekGamesRepositiry;
    }

    public function __invoke(WeekGamesQuery $query)
    {
        return $this->weekGamesRepositiry->getGames($query->getWeekNumber());
    }

}
