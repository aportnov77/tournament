<?php

namespace Tournament\Application\Query\Teams\Handler;

use Tournament\Application\Query\Teams\TeamsListItemDTO;
use Tournament\Application\Query\Teams\TeamsListQuery;
use Tournament\Domain\Team\Team;

class TeamsListQueryHandler
{
    private TeamsListRepositoryInterface $teamsListRepository;

    /**
     * @param TeamsListRepositoryInterface $teamsListRepository
     */
    public function __construct(TeamsListRepositoryInterface $teamsListRepository)
    {
        $this->teamsListRepository = $teamsListRepository;
    }

    /**
     * @param TeamsListQuery $query
     * @return Team[]
     */
    public function __invoke(TeamsListQuery $query): array
    {
        return $this->teamsListRepository->getAllByTournamentUuid($query->getTournamentUuid());
    }

}
