<?php

namespace Tournament\Application\Command\TournamentTable\Handler;

use Tournament\Application\Command\TournamentTable\RegisterWinnerCommand;

class RegisterWinnerCommandHandler
{
    private TournamentTableRepositoryInterface $tournamentTableRepository;

    /**
     * @param TournamentTableRepositoryInterface $tournamentTableRepository
     */
    public function __construct(TournamentTableRepositoryInterface $tournamentTableRepository)
    {
        $this->tournamentTableRepository = $tournamentTableRepository;
    }

    public function __invoke(RegisterWinnerCommand $command)
    {
        $this->tournamentTableRepository->addWon($command->getTournamentUuid(), $command->getPlayerUuid());
    }

}
