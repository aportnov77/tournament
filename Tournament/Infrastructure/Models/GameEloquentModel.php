<?php

namespace Tournament\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class GameEloquentModel extends Model
{
    protected $table = 'game';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;

    public function teamA()
    {
        return $this->belongsTo(TeamEloquentModel::class, 'playerAUuid', 'uuid');
    }

    public function teamB()
    {
        return $this->belongsTo(TeamEloquentModel::class, 'playerBUuid', 'uuid');
    }
}
