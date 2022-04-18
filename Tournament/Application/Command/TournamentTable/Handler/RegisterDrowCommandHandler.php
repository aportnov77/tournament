<?php

namespace Tournament\Application\Command\TournamentTable\Handler;

use Tournament\Application\Command\TournamentTable\RegisterDrowCommand;

class RegisterDrowCommandHandler
{
    private TournamentTableRepositoryInterface $tournamentTableRepository;

    /**
     * @param TournamentTableRepositoryInterface $tournamentTableRepository
     */
    public function __construct(TournamentTableRepositoryInterface $tournamentTableRepository)
    {
        $this->tournamentTableRepository = $tournamentTableRepository;
    }

    public function __invoke(RegisterDrowCommand $command)
    {
        $this->tournamentTableRepository->addDrow(
            $command->getTournamentUuid(),
            $command->getPlayerAUuid(),
            $command->getPlayerBUuid()
        );
    }
}
