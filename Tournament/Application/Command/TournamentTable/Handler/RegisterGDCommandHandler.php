<?php

namespace Tournament\Application\Command\TournamentTable\Handler;

use Illuminate\Support\Facades\DB;
use Tournament\Application\Command\TournamentTable\RegisterGDCommand;

class RegisterGDCommandHandler
{
    private TournamentTableGDRegistratorInterface $tournamentTableGDRegistrator;

    /**
     * @param TournamentTableGDRegistratorInterface $tournamentTableGDRegistrator
     */
    public function __construct(TournamentTableGDRegistratorInterface $tournamentTableGDRegistrator)
    {
        $this->tournamentTableGDRegistrator = $tournamentTableGDRegistrator;
    }

    public function __invoke(RegisterGDCommand $command)
    {
        $this->tournamentTableGDRegistrator->registerGD(
            $command->getTournamentUuid(),
            $command->getPlayerUuid(),
            $command->getGd()
        );
    }

}
