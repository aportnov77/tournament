<?php

namespace App\Providers;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Tournament\Application\Command\GameResult\Handler\RegisterGameResultCommandHandler;
use Tournament\Application\Command\GameResult\RegisterGameResultCommand;
use Tournament\Application\Command\Play\Handler\PlayAllWeeksCommandHandler;
use Tournament\Application\Command\Play\Handler\PlayGameCommandHandler;
use Tournament\Application\Command\Play\Handler\PlayWeekCommandHandler;
use Tournament\Application\Command\Play\PlayAllWeeksCommand;
use Tournament\Application\Command\Play\PlayGameCommand;
use Tournament\Application\Command\Play\PlayWeekCommand;
use Tournament\Application\Command\Tournament\CreateTournamentCommand;
use Tournament\Application\Command\Tournament\GenerateFixturesCommand;
use Tournament\Application\Command\Tournament\Handler\CreateTournamentCommandHandler;
use Tournament\Application\Command\Tournament\Handler\GenerateFixturesCommandHandler;
use Tournament\Application\Command\Tournament\Handler\TeamsRepositoryInterface;
use Tournament\Application\Command\Tournament\Handler\TournamentTableCreatorInterface;
use Tournament\Application\Command\Tournament\Handler\WeekRepositoryInterface;
use Tournament\Application\Command\TournamentTable\Handler\RegisterDrowCommandHandler;
use Tournament\Application\Command\TournamentTable\Handler\RegisterGDCommandHandler;
use Tournament\Application\Command\TournamentTable\Handler\RegisterLossCommandHandler;
use Tournament\Application\Command\TournamentTable\Handler\RegisterWinnerCommandHandler;
use Tournament\Application\Command\TournamentTable\Handler\TournamentTableGDRegistratorInterface;
use Tournament\Application\Command\TournamentTable\Handler\TournamentTableRepositoryInterface;
use Tournament\Application\Command\TournamentTable\RegisterDrowCommand;
use Tournament\Application\Command\TournamentTable\RegisterGDCommand;
use Tournament\Application\Command\TournamentTable\RegisterLossCommand;
use Tournament\Application\Command\TournamentTable\RegisterWinnerCommand;
use Tournament\Application\Query\Teams\Handler\TeamsListQueryHandler;
use Tournament\Application\Query\Teams\Handler\TeamsListRepositoryInterface;
use Tournament\Application\Query\Teams\TeamsListQuery;
use Tournament\Application\Query\Tournament\Handler\TournamentTableQueryHandler;
use Tournament\Application\Query\Tournament\Handler\TournamentTableResultInterface;
use Tournament\Application\Query\Tournament\TournamentTableQuery;
use Tournament\Application\Query\Week\AllWeeksQuery;
use Tournament\Application\Query\Week\Handler\AllWeeksQueryHandler;
use Tournament\Application\Query\WeekResult\AllWeeksResultQuery;
use Tournament\Application\Query\WeekResult\Handler\AllWeeksResultQueryHandler;
use Tournament\Infrastructure\GameResultRepository;
use Tournament\Infrastructure\TeamRepository;
use Tournament\Infrastructure\TournamentTableRepository;
use Tournament\Infrastructure\WeekRepository;
use Tournament\Infrastructure\WeekResultRepository;

class AppServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    public $singletons = [
        TeamsRepositoryInterface::class => TeamRepository::class,
        TeamsListRepositoryInterface::class => TeamRepository::class,
        WeekRepositoryInterface::class => WeekRepository::class,
        \Tournament\Application\Command\Play\Handler\WeekRepositoryInterface::class => WeekRepository::class,
        \Tournament\Application\Query\Week\Handler\WeekRepositoryInterface::class => WeekRepository::class,
        \Tournament\Application\Query\WeekResult\Handler\WeekResultRepositoryInterface::class => WeekResultRepository::class,
        \Tournament\Application\Command\Play\Handler\TeamRepositoryInterface::class => TeamRepository::class,
        \Tournament\Application\Command\GameResult\Handler\GameResultRepositoryInterface::class => GameResultRepository::class,
        TournamentTableCreatorInterface::class => TournamentTableRepository::class,
        TournamentTableRepositoryInterface::class => TournamentTableRepository::class,
        \Tournament\Application\Event\GameResult\Listener\WeekRepositoryInterface::class => WeekRepository::class,
        TournamentTableGDRegistratorInterface::class => TournamentTableRepository::class,
        TournamentTableResultInterface::class => TournamentTableRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bus::map([
                     CreateTournamentCommand::class => CreateTournamentCommandHandler::class,
                     GenerateFixturesCommand::class => GenerateFixturesCommandHandler::class,

                     PlayAllWeeksCommand::class => PlayAllWeeksCommandHandler::class,
                     PlayWeekCommand::class => PlayWeekCommandHandler::class,
                     PlayGameCommand::class => PlayGameCommandHandler::class,

                     RegisterDrowCommand::class => RegisterDrowCommandHandler::class,
                     RegisterWinnerCommand::class => RegisterWinnerCommandHandler::class,
                     RegisterLossCommand::class => RegisterLossCommandHandler::class,
                     RegisterGDCommand::class => RegisterGDCommandHandler::class,

                     RegisterGameResultCommand::class => RegisterGameResultCommandHandler::class,

                     TournamentTableQuery::class => TournamentTableQueryHandler::class,
                     TeamsListQuery::class => TeamsListQueryHandler::class,
                     AllWeeksQuery::class => AllWeeksQueryHandler::class,
//                     AllWeeksResultQuery::class => AllWeeksResultQueryHandler::class,
                 ]);

    }
}
