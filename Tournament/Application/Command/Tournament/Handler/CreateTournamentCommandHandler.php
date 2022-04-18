<?php

namespace Tournament\Application\Command\Tournament\Handler;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tournament\Application\Command\Tournament\CreateTournamentCommand;
use Tournament\Domain\Tournament\Tournament;

class CreateTournamentCommandHandler
{
    private TeamsRepositoryInterface $repository;
    private TournamentTableCreatorInterface $tournamentTableCreator;

    /**
     * @param TeamsRepositoryInterface $repository
     * @param TournamentTableCreatorInterface $tournamentTableCreator
     */
    public function __construct(
        TeamsRepositoryInterface $repository,
        TournamentTableCreatorInterface $tournamentTableCreator
    ) {
        $this->repository = $repository;
        $this->tournamentTableCreator = $tournamentTableCreator;
    }


    public function __invoke(CreateTournamentCommand $command)
    {
        $tournament = new Tournament($command->getTournamentUuid());
        $teams = [];
        $teams[] = $tournament->addTeam((string)Str::uuid(), 'Liverpool', rand(6, 10));
        $teams[] = $tournament->addTeam((string)Str::uuid(), 'Manchester City', rand(6, 10));
        $teams[] = $tournament->addTeam((string)Str::uuid(), 'Chelsea', rand(6, 10));
        $teams[] = $tournament->addTeam((string)Str::uuid(), 'Arsenal', rand(6, 10));

        DB::transaction(function () use ($teams, $command) {
            $this->repository->saveAll($teams);
            $this->tournamentTableCreator->create($command->getTournamentUuid(), $teams);
        });
    }

}
