<?php

namespace Tournament\Application\Query\Tournament\Handler;

use Tournament\Application\Query\Tournament\TournamentTableQuery;

class TournamentTableQueryHandler
{
    private TournamentTableResultInterface $tournamentTableResult;

    /**
     * @param TournamentTableResultInterface $tournamentTableResult
     */
    public function __construct(TournamentTableResultInterface $tournamentTableResult)
    {
        $this->tournamentTableResult = $tournamentTableResult;
    }

    public function __invoke(TournamentTableQuery $query)
    {
        return $this->tournamentTableResult->getTournamentTable($query->getTournamentUuid());
    }

}
