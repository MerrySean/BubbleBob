<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function getTransactionDetailsOf($sales)
    {
        $transactions = [];

        foreach ($sales as $k => $t) {
            $d = [
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

        return $transactions;
    }

    public function getProductSales()
    {
        $ti = new \App\Models\Transaction;
        $a = new \App\Models\User;
        $a = $a->select('id')->where('user_type' , 'admin')->get()->toArray();
        return $this->getTransactionDetailsOf($ti->whereNotIn('transaction_by', [$a])->get());
    }

    public function getPettyCashTransactions()
    {
        $ti = new \App\Models\Transaction;
        $a = new \App\Models\User;
        $a = $a->select('id')->where('user_type' , 'admin')->get()->toArray();
        return $this->getTransactionDetailsOf($ti->whereIn('transaction_by', [$a])->get());
    }
}
