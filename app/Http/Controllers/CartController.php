<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('cart');
    }

    public function add(Request $request)
    {
        Session::put("cart.$request->variant", $request->count ?? 1);

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        Session::remove("cart.$request->variant");

        return redirect()->route("cart.index");
    }
}
