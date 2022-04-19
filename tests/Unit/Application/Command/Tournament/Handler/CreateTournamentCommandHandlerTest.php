<?php

namespace Tests\Unit\Application\Command\Tournament\Handler;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;
use Tournament\Application\Command\Tournament\CreateTournamentCommand;
use Tournament\Application\Command\Tournament\Handler\CreateTournamentCommandHandler;
use Tournament\Application\Command\Tournament\Handler\TeamsRepositoryInterface;
use Tournament\Application\Command\Tournament\Handler\TournamentTableCreatorInterface;
use Tournament\Domain\Team\Team;

class CreateTournamentCommandHandlerTest extends TestCase
{
    public function test_handle()
    {
        $uuid = 'tournament_uuid';

        $teamsRepo = $this->createMock(TeamsRepositoryInterface::class);
        $teamsRepo->expects($this->once())->method('saveAll')->with(
            $this->callback(function ($teams) use ($uuid) {
                return $this->checkTeams($teams, $uuid);
            })
        );

        DB::shouldReceive('beginTransaction')->once();
        DB::shouldReceive('commit')->once();

        $tournamentTableRepo = $this->createMock(TournamentTableCreatorInterface::class);
        $tournamentTableRepo->expects($this->once())->method('create')->with(
            $this->equalTo($uuid),
            $this->callback(function ($teams) use ($uuid) {
                return $this->checkTeams($teams, $uuid);
            })
        );

        $handler = new CreateTournamentCommandHandler($teamsRepo, $tournamentTableRepo);

        $command = new CreateTournamentCommand($uuid);
        $handler($command);
    }

    private function checkTeams(array $teams, string $uuid)
    {
        if (empty($teams)) {
            return false;
        }

        foreach ($teams as $team) {
            if (!($team instanceof Team)) {
                return false;
            }
            if ($team->getTournamentUuid() !== $uuid) {
                return false;
            }
        }
        return true;
    }
}
