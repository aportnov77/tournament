<?php

namespace Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use Tournament\Domain\Tournament\Exception\TeamAlreadyAddedException;
use Tournament\Domain\Tournament\Exception\TeamSizeExceededException;
use Tournament\Domain\Tournament\Tournament;

class TournamentTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create_team()
    {
        $uuid = 'uuid_string';

        $tournament = new Tournament($uuid);

        $teamUuid = 'team_uuid';
        $teamName = 'team_name';
        $teamPower = 10;
        $team = $tournament->addTeam($teamUuid, $teamName, $teamPower);

        $this->assertEquals($uuid, $team->getTournamentUuid());
        $this->assertEquals($teamUuid, $team->getUuid());
        $this->assertEquals($teamName, $team->getName());
        $this->assertEquals($teamPower, $team->getPower());
    }

    public function test_team_exactly_number(){
        $uuid = 'uuid_string';
        $tournament = new Tournament($uuid);

        for ($i=0; $i<Tournament::GROUP_SIZE; $i++){
            $teamUuid = 'team_uuid' . $i;
            $teamName = 'team_name' . $i;
            $teamPower = $i;

            $team = $tournament->addTeam($teamUuid, $teamName, $teamPower);

            $this->assertEquals($uuid, $team->getTournamentUuid());
            $this->assertEquals($teamUuid, $team->getUuid());
            $this->assertEquals($teamName, $team->getName());
            $this->assertEquals($teamPower, $team->getPower());
        }

        $teamUuid = 'team_uuid';
        $teamName = 'team_name';
        $teamPower = 10;

        $this->expectException(TeamSizeExceededException::class);
        $tournament->addTeam($teamUuid, $teamName, $teamPower);
    }

    public function test_team_already_in_tournament(){
        $uuid = 'uuid_string';

        $tournament = new Tournament($uuid);

        $teamUuid = 'team_uuid';
        $teamName = 'team_name';
        $teamPower = 10;
        $team = $tournament->addTeam($teamUuid, $teamName, $teamPower);

        $this->expectException(TeamAlreadyAddedException::class);
        $tournament->addTeam($teamUuid, $teamName, $teamPower);
    }
}
