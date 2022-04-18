<?php

namespace Tournament\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentTableEloquentModel extends Model
{
    protected $table = 'tournament_table';

    protected $guarded = [];

    public $timestamps = false;
}
