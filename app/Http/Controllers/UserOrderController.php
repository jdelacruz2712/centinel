<?php

namespace Centinel\Http\Controllers;

use Centinel\User;
use Centinel\UsersOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserOrderController extends CentinelController
{
    public function viewOrders(Request $request)
    {
        $response = $request->user()->authorizeRoles(['user', 'admin']);
        if ($response) return view('elements/orderConfirmation/listOrders');
    }

    public function gestionCP(Request $request)
    {
        $response = $request->user()->authorizeRoles(['user', 'admin']);
        if ($response) return view('elements/formularios/formCP');
    }

    public function getCP(Request $request)
    {
        dd($request);
        if ($request->isMethod('get')) {
            $resultado = UsersOrder::Select()
                ->where('user_id', Auth::id())
                ->where('number_order', $request->numCP)
                ->get()
                ->toArray();

            return $resultado;
        }
    }

    public function saveCP(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate(request(), [
                'numCP'         => 'required',
                'dateBegin'     => 'required',
                'dateFinish'    => 'required'
            ]);

            UsersOrder::updateOrInsert([
                'user_id' => Auth::id(),
                'number_order' => $request->numCP
            ], [
                'number_order'  => $request->numCP,
                'date_begin'    => $request->dateBegin,
                'date_finish'   => $request->dateFinish
            ]);

            return ['message' => 'Success'];
        }
        return ['message' => 'Error'];
    }

    public function listOrders(Request $request)
    {
        if ($request->isMethod('post')) {
            $query_orders_list = $this->orders_list_query();
            $builderview = $this->builderview($query_orders_list);
            $outgoingcollection = $this->outgoingcollection($builderview);
            $list_orders = $this->FormatDatatable($outgoingcollection);
            return $list_orders;
        }
    }

    protected function orders_list_query()
    {
        $orders_list_query = UsersOrder::Select()
            ->where('users_orders.id', Auth::id())
            ->join('users', 'users_orders.user_id', '=', 'users.id')
            ->get()
            ->toArray();
        return $orders_list_query;
    }

    protected function builderview($orders_list_query, $type = '')
    {
        $posicion = 0;
        $idList = 0;
        foreach ($orders_list_query as $query) {
            $idList++;
            $builderview[$posicion]['id']               = $idList;
            $builderview[$posicion]['id_user']          = $query['user_id'];
            $builderview[$posicion]['id_cp']            = $query['id'];
            $builderview[$posicion]['number_cp']        = $query['number_order'];
            $builderview[$posicion]['name_complete']    = ucwords(Str::lower($query['name'])) . ' ' . ucwords(Str::lower($query['first_last_name'])) . ' ' . ucwords(Str::lower($query['second_last_name']));
            $builderview[$posicion]['fecha_inicio']     = Carbon::parse($query['date_begin'])->format('d/m/Y');
            $builderview[$posicion]['fecha_finish']     = Carbon::parse($query['date_finish'])->format('d/m/Y');
            $builderview[$posicion]['status']           = $query['status'];
            $posicion++;
        }

        if (!isset($builderview)) {
            $builderview = [];
        }

        return $builderview;
    }

    public function outgoingcollection($builderview){
        $outgoingcollection = new \Illuminate\Support\Collection;
        foreach ($builderview as $view) {
            $outgoingcollection->push([
                'id'                =>  $view['id'],
                'name_complete'     =>  $view['name_complete'],
                'number_cp'         =>  $view['number_cp'],
                'fecha_inicio'      =>  $view['fecha_inicio'],
                'fecha_finish'      =>  $view['fecha_finish'],
                'status'            =>  $view['status'],
                'action'            =>  ''
            ]);
        }
        return $outgoingcollection;
    }
}