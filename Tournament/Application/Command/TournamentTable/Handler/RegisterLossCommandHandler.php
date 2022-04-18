<?php

namespace Tournament\Application\Command\TournamentTable\Handler;

use Tournament\Application\Command\TournamentTable\RegisterLossCommand;

class RegisterLossCommandHandler
{
    private TournamentTableRepositoryInterface $tournamentTableRepository;

    /**
     * @param TournamentTableRepositoryInterface $tournamentTableRepository
     */
    public function __construct(TournamentTableRepositoryInterface $tournamentTableRepository)
    {
        $this->tournamentTableRepository = $tournamentTableRepository;
    }

    public function __invoke(RegisterLossCommand $command)
    {
        $this->tournamentTableRepository->addLoss($command->getTournamentUuid(), $command->getPlayerUuid());
    }

}
