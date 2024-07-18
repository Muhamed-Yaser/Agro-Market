<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index ()
    {
        return view('dashboard.dashboard');
    }

    public function dashboard()
    {
        $totalProducts = Product::count();
        $newProducts = Product::where('created_at', '>=', now()->subMonth())->count();
        $sellersCount = User::where('role', 'seller')->count();

        return view('dashboard.dashboard', compact('totalProducts', 'sellersCount', 'newProducts'));
    }
}
