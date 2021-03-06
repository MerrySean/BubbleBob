<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Sale extends Model
{
    public function getTransactionDetailsOf($sales)
    {
        $transactions = [];
        if (is_object($sales)) {
            foreach ($sales as $k => $t) {
                $d = [
                    'id' => $t->id,
                    'Details' => [
                        'Cash' => $t->Customer_Cash,
                        'Cost' =>  $t->Total_Cost,
                        'Change' => $t->Customer_Change,
                        'transaction_date' => $t->created_at,
                        'transaction_by' => $t->User->firstname . " " . $t->User->lastname,
                    ],
                    'Customer' => [
                        'Name'    => $t->Customer->name,
                        'Address' => $t->Customer->address,
                        'Contact'    => $t->Customer->contact,
                    ],
                    'transactions' => $t->GetFullTransactionDetails(),
                ];
                array_push($transactions, $d);
            }
        } else {
            $sales = new Transaction($sales);
            $d = [
                'id' => $sales->id,
                'Details' => [
                    'Cash' => $sales->Customer_Cash,
                    'Cost' =>  $sales->Total_Cost,
                    'Change' => $sales->Customer_Change,
                    'transaction_date' => $sales->created_at,
                    'transaction_by' => $sales->User->firstname . " " . $sales->User->lastname,
                ],
                'Customer' => [
                    'Name'    => $sales->Customer->name,
                    'Address' => $sales->Customer->address,
                    'Contact'    => $sales->Customer->contact,
                ],
                'transactions' => $sales->GetFullTransactionDetails(),
            ];
            // dd($d);
            return $d;
        }

        return $transactions;
    }

    public function getProductSales()
    {
        $ti = new \App\Models\Transaction;
        return $this->getTransactionDetailsOf($ti->all());
    }

    public function getPettyCashTransactions()
    {
        $ti = new \App\Models\Transaction;
        $a = new \App\Models\User;
        $a = $a->select('id')->where('user_type' , 'admin')->get()->toArray();
        return $this->getTransactionDetailsOf($ti->whereIn('transaction_by', [$a])->get());
    }

    public function getSalesMaxDate()
    {
        $ti = new \App\Models\Transaction;
        return $ti->select('created_at')->orderBy('created_at','desc')->first();
    }

    public function getSalesMinDate()
    {
        $ti = new \App\Models\Transaction;
        return $ti->select('created_at')->orderBy('created_at')->first();
    }

    public function GetTransactionById($id)
    {
        $ti = new \App\Models\Transaction;
        return $this->getTransactionDetailsOf($ti->find($id)->toArray());
    }
}
