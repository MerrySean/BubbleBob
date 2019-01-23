<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    //

    public function transaction(Request $r)
    {
        $ci = new \App\Models\Customer;
        // customer should have unique Name, Contact Number & Address
        // if customer has not yet been created via Name, Contact Number & Address
        $c = $ci->GetOrCreateCustomer($r->Transaction['customer']);
        // Create New Transaction Based on Customer ID and Transaction Details from request
        $ti = new \App\Models\Transaction;
            $ti->Customer_Cash = $r->Transaction['customerCash'];
            $ti->Total_Cost = $r->Transaction['TotalCost'];
            $ti->Customer_Change = $r->Transaction['change'];
            $ti->Customer_id = $c->id;
        $ti->save();
        // Add to transation_details table every services inside services array
        $tdi = new \App\Models\Transaction_Details;
            // Add Wash services
            $tdi->create(
                [
                    'transaction_id'=> $ti->id,
                    'transaction_by'=> $r->user()->id,
                    'product_id'    => $r->services['wash']['id']
                ]
            );
            $tdi->create(
                [
                    'transaction_id'=> $ti->id,
                    'transaction_by'=> $r->user()->id,
                    'product_id'    => $r->services['dry']['id']
                ]
            );
            // add all additionals
            foreach ($r->services['additionals'] as $key => $value) {
                $tdi->create(
                    [
                        'transaction_id'=> $ti->id,
                        'transaction_by'=> $r->user()->id,
                        'product_id'    => $value['id']
                    ]
                );
            }
        // Send a Response of success
        return response()->json([ 'success' => true ]);
    }

    public function customerByName(Request $r)
    {
        $ci = new \App\Models\Customer;
        $c = $ci->where('name', $r->query('name'))->get();
        return response()->json($c);
    }
}
