<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Produk::all();
        return view('dashboard', compact('items'));
    }

    public function show($id)
{
    $item = Produk::find($id);
    
    if (!$item) {
        return redirect('/')->with('error', 'Produk tidak ditemukan');
    }

    return view('show', compact('item'));
}

}
