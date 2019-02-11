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
            $ti->transaction_by = $r->user()->id;
        $ti->save();
        // Add to transation_details table every services inside services array
        $tdi = new \App\Models\Transaction_Details;
            // Add Wash services
            $tdi->create(
                [
                    'transaction_id'=> $ti->id,
                    'product_id'    => $r->services['wash']['id']
                ]
            );
            $tdi->create(
                [
                    'transaction_id'=> $ti->id,
                    'product_id'    => $r->services['dry']['id']
                ]
            );
            // add all additionals
            foreach ($r->services['additionals'] as $key => $value) {
                $tdi->create(
                    [
                        'transaction_id'=> $ti->id,
                        'product_id'    => $value['id']
                    ]
                );
            }
        // Send a Response of success
        return response()->json([ 'success' => true ]);
    }

    public function customerByName(Request $r)
    {
        if ($r->query('name') == '') {
            return response()->json([]);
        }
        $ci = new \App\Models\Customer;
        $c = $ci->where('name', 'LIKE', '%'.$r->query('name').'%')->where('address', '<>', 'Admin')->get();
        return response()->json($c);
    }

    public function PettyCash(Request $r)
    {
        $ci = new \App\Models\Customer;
        // customer should have unique Name, Contact Number & Address
        // if customer has not yet been created via Name, Contact Number & Address
        $c = $ci->GetOrCreateCustomer([
                'name'      => $r->user()->firstname . " " . $r->user()->lastname,
                'contact'   => $r->user()->contact,
                'address'   => 'Admin',
            ]);
        // Create New Transaction Based on Customer ID and Transaction Details from request
        $ti = new \App\Models\Transaction;
            $ti->Customer_Cash = $r->money;
            $ti->Total_Cost = $r->money;
            $ti->Customer_Change = $r->money;
            $ti->Customer_id = $c->id;
            $ti->transaction_by = $r->user()->id;
        $ti->save();

        // Get Or Create Special Product Petty Cash If not exist
        $p = new \App\Models\Product;

        $pi = $p->GetOrCreateProduct(
            [
                        'name' => "Petty Cash",
                       'price' => 0,
             'type_of_product' => "Special",
                    'quantity' => 1,
            'last_update_user' => $r->user()->id,
            ]
        );
        
            // Add to transation_details table the Petty Money
            $tdi = new \App\Models\Transaction_Details;
            // Add Petty Money
            $tdi->create(
                [
                    'transaction_id'=> $ti->id,
                    'product_id'    => $pi->id
                ]
            );
            
        // Send a Response of success
        return response()->json([ 'success' => true ]);
    }
}
