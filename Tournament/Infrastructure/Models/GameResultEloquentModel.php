<?php

namespace Tournament\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class GameResultEloquentModel extends Model
{
    protected $table = 'game_result';

    protected $guarded = [];

    public $timestamps = false;
}
