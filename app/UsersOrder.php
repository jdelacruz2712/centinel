<?php

namespace Centinel;

use Illuminate\Database\Eloquent\Model;

class UsersOrder extends Model
{
    protected $connection   = 'laravel';
    protected $table        = 'users_orders';
    public    $timestamps   = false;

    protected $fillable = [
        'user_id', 'number_order', 'status', 'date_begin', 'date_finish',
    ];
}