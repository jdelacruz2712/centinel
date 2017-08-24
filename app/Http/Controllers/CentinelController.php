<?php

namespace Centinel\Http\Controllers;

use Yajra\Datatables\Datatables;

class CentinelController extends Controller
{
    /**
     * [FormatDatatable Función que retorna en formato Datatable]
     * @param [Collection] $collection [Collection con los datos a mostrar en los reportes]
     */
    protected function FormatDatatable($collection)
    {
        return Datatables::of($collection)
            ->make(true);
    }
}
