<?php

namespace Centinel;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection   = 'laravel';
    protected $table        = 'roles';

    public function users(){
        return $this
            ->belongsToMany('Centinel\User')
            ->withTimestamps();
    }
}
