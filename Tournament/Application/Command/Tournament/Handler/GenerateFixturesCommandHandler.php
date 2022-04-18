<?php

namespace Tournament\Application\Command\Tournament\Handler;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tournament\Application\Command\Tournament\GenerateFixturesCommand;
use Tournament\Domain\Tournament\Tournament;
use Tournament\Domain\Week\Game;
use Tournament\Domain\Week\Week;

class GenerateFixturesCommandHandler
{
    private TeamsRepositoryInterface $teamsRepository;
    private WeekRepositoryInterface $weekRepository;

    /**
     * @param TeamsRepositoryInterface $teamsRepository
     * @param WeekRepositoryInterface $weekRepository
     */
    public function __construct(TeamsRepositoryInterface $teamsRepository, WeekRepositoryInterface $weekRepository)
    {
        $this->teamsRepository = $teamsRepository;
        $this->weekRepository = $weekRepository;
    }


    public function __invoke(GenerateFixturesCommand $command)
    {
        $tournament = new Tournament($command->getTournamentUuid());
        $teams = $this->teamsRepository->getAllByTournamentUuid($command->getTournamentUuid());

        $w = [];
        for ($i = 0; $i < Tournament::GROUP_SIZE - 1; $i++) {
            $index = $i + 2;
            if ($index > Tournament::GROUP_SIZE - 2) {
                $index = $index - 3;
            }

            $w[$i][] = [
                'playerA' => $teams[0 + $i],
                'playerB' => $teams[$index]
            ];

            $sindex = $i + 1;
            if ($sindex > Tournament::GROUP_SIZE - 2) {
                $sindex = $sindex - 3;
            }

            $w[$i][] = [
                'playerA' => $teams[Tournament::GROUP_SIZE - 1],
                'playerB' => $teams[$sindex]
            ];
        }

        $weeks = [];
        foreach ($w as $weekGames) {
            $games = [];
            foreach ($weekGames as $game) {
                $aUuid = $game['playerA']->getUuid();
                $bUuid = $game['playerB']->getUuid();
                $games[] = new Game($aUuid, $bUuid);
            }
            $weeks[] = $tournament->addWeek((string)Str::uuid(), $games);
        }

        foreach ($w as $weekGames) {
            $games = [];
            foreach ($weekGames as $game) {
                $aUuid = $game['playerA']->getUuid();
                $bUuid = $game['playerB']->getUuid();
                $games[] = new Game($bUuid, $aUuid);
            }
            $weeks[] = $tournament->addWeek((string)Str::uuid(), $games);
        }

        DB::transaction(function () use ($weeks){
            $this->weekRepository->saveAll($weeks);
        });
    }

}
