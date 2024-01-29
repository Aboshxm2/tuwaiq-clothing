<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->name)) {
            $query = Product::where('name', "LIKE", "%{$request->name}%");
        }else if(isset($request->groups)) {
            $query = Group::whereIn('id', $request->groups)->first()->products();
        }else if(isset($request->categories)) {
            $query = Category::whereIn('id', $request->categories)->first()->products();
        }else if(isset($request->tags)) {
            $query = Tag::whereIn('id', $request->tags)->first()->products();
        }

        return view('search', ["products" => isset($query)? $query->get(): Product::all()]);
    }
}
