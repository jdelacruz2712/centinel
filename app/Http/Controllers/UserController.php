<?php

namespace Centinel\Http\Controllers;

use Centinel\User;
use Centinel\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends CentinelController
{
    public function __construct(){
        $this->middleware('auth');
    }
}
