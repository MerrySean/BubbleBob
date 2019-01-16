<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function addProduct(Request $r)
    {
        $p = new \App\Models\Product;

        $p->name = $r->name;
        $p->price = $r->price;
        $p->type_of_product = $r->type;
        $p->quantity = $r->quantity;
        $p->last_update_user = $r->user()->id;
        $p->save();
        return response()->json($p);
    }

    public function getProduct()
    {
        $p = new \App\Models\Product;
        return response()->json($p->all());
    }
}
