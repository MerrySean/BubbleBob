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
        $p->description = $r->description;
        $p->last_update_user = $r->user()->id;
        $p->save();
        return response()->json($p);
    }

    public function getProduct($type)
    {
        $p = new \App\Models\Product;
        return response()->json($p->where('type_of_product',$type)->get());
    }

    public function UpdateProduct(Request $r)
    {
        $p = \App\Models\Product::find($r->id);
        $p->name = $r->name;
        $p->price = $r->price;
        $p->type_of_product = $r->type;
        $p->quantity = $r->quantity;
        $p->description = $r->description;
        $p->last_update_user = $r->user()->id;
        $p->save();
        return response()->json($p);
    }

    public function DeleteProduct(Request $r)
    {
        $p = \App\Models\Product::find($r->id);
        $p->delete();
    }
}
