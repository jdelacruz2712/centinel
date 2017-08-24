<?php

namespace Centinel\Http\Controllers;

use Centinel\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends CentinelController
{

    public function __construct(){
        $this->middleware('auth');
    }

    // Rutas por controlador
    public function index(Request $request){
        $response = $request->user()->authorizeRoles(['user', 'admin']);
        if($response) return view('front');
    }
}
