<?php

namespace Centinel\Http\Controllers;

use Centinel\User;
use Centinel\Role;
use Centinel\UsersExchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends CentinelController
{
    public function __construct(){
        $this->middleware('auth');
    }

    // Rutas por controlador
    public function index(Request $request){
        $response = $request->user()->authorizeRoles(['user', 'admin']);
        if($response) return view('front');
    }

    public function changeExchange(Request $request){
        $response = $request->user()->authorizeRoles(['user', 'admin']);
        if($response) return view('elements/formularios/formExchange');
    }

    public function getExchange(Request $request){
        if($request->isMethod('get')){
            $resultado = UsersExchange::Select()
                            ->where('user_id', Auth::id())
                            ->get()
                            ->toArray();

            return $resultado;
        }
    }

    public function saveExchange(Request $request){
        if ($request->isMethod('post')) {
            $this->validate(request(), [
                'numExchange'     => 'required'
            ]);

            UsersExchange::updateOrInsert([
                'user_id' => Auth::id()
            ], [
                'user_id'       =>  Auth::id(),
                'number_exchange'  =>  $request->numExchange
            ]);

            return ['message' => 'Success'];
        }
        return ['message' => 'Error'];
    }
}
