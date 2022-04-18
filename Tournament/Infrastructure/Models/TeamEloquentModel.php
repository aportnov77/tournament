<?php

namespace Tournament\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class TeamEloquentModel extends Model
{
    protected $table = 'team';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;
}
