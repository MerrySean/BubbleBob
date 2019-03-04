<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function usersView()
    {
        $d = new \App\Models\User;
        return view('pages.admin.users')->with('users', $d->all());
    }

    public function usersLogsView()
    {
        $d = new \App\Models\User_Logs;
        return view('pages.admin.userLogs')->with('users_logs', $d->all());
    }

    public function productsView()
    {
        $d = new \App\Models\Product;
        return view('pages.admin.products')->with('products', $d->all());
    }

    public function salesView()
    {
        $d = new \App\Models\Sale;
        return view('pages.admin.sales')
        ->with('sales', $d->getProductSales())
        ->with('MaxDate', $d->getSalesMaxDate())
        ->with('MinDate', $d->getSalesMinDate());
    }

    public function reportsView()
    {
        $d = new \App\Models\Customer;
        return view('pages.admin.reports')->with('users', $d->all());
    }

    // Staff Routes
    public function user_dashboard()
    {
        $d = new \App\Models\Product;
        return view('pages.user.dashboard')
                    ->with('wash', array_chunk($d->GetWash()->toArray(),2))
                    ->with('dry', array_chunk($d->GetDry()->toArray(),2))
                    ->with('additionals', array_chunk($d->GetAdditional()->toArray(),2));
    }

    // Petty Cash View
    public function PettyCashView()
    {
        $d = new \App\Models\Sale;
        return view('pages.admin.pettyCash')->with('sales', $d->getPettyCashTransactions());
    }

    // logged-in user's Profiles page
    public function profile()
    {
        return view('pages.profile');
    }
}
