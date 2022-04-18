<?php

namespace Tournament\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class WeekEloquentModel extends Model
{
    protected $table = 'week';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;

    public function games()
    {
        return $this->hasMany(GameEloquentModel::class, 'weekUuid', 'uuid');
    }
}
