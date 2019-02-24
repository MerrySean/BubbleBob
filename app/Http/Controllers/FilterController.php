<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class FilterController extends Controller
{
    //
    public function SortByDate(Request $r, $model)
    {
        $model = app('App\\Models\\'.$model);
        // $model = new $model;
        
        // SELECT * FROM transactions where transactions.created_at BETWEEN '2019-02-1 00:00:00' AND '2019-02-28 00:00:00'
        // format YEAR - MONTH - DAY
        date_default_timezone_set('Asia/Manila');
        // dd(new Carbon($r->To));
        if (isset($r->From)) {
            // from date is last date of computer
            $f = new Carbon($r->From);
            $f = $f->format('Y-m-d 00:i:s');
        } else {
            // from date is 1999-01-1
            $f = new Carbon('1999-01-1');
            $f = $f->format('Y-m-d 00:i:s');
        }
        if (isset($r->To)) {
            // to is user selected
            $t = new Carbon($r->To);
            $t = $t->format('Y-m-d 00:i:s');
        } else {
            // to is current date
            $t = new Carbon();
            $t = $t->format('Y-m-d 00:i:s');
        }
        
        // dd($model->whereBetween(DB::raw("DATE(`created_at`)"),[$f, $t])->toSql());

        return response()->json($model->whereBetween(DB::raw("DATE(`created_at`)"),[$f, $t])->get());
    }
}
