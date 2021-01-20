<?php

namespace App\Http\Controllers\BackEnd;

use App\User;
use App\Order;
use App\Branch;
use App\Client;
use App\Product;
use App\Category;
use App\PromoCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $users = User::where('role', 'user')->count();
        $admins = User::where('role', '!=', 'user')->count();
        $categories = Category::count();
        $products = Product::count();
        $branches = Branch::count();
        $promos = PromoCode::count();
        $clients = Client::count();
        $orders= Order::where('confirmed_by_user', 1)->count();

        $lastest10Users = User::where('role', 'user')->orderBy('id', 'desc')->limit(10)->get();
        $lastest10Orders = Order::where('confirmed_by_user', 1)->orderBy('id', 'desc')->limit(10)->get();

        return view('backend.dashboard', compact('users','admins','categories','products','branches','promos','clients','orders','lastest10Users','lastest10Orders'));
    }
}
