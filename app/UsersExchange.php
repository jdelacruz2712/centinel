<?php

namespace Centinel;

use Illuminate\Database\Eloquent\Model;

class UsersExchange extends Model
{
    protected $connection   = 'laravel';
    protected $table        = 'users_exchanges';
    protected $primaryKey   = 'id';
    public    $timestamps   = false;

    protected $fillable = [
        'user_id', 'num_exchange',
    ];
}
