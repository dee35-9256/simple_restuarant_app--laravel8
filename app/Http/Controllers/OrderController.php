<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class OrderController extends Controller
{
    //
    public function showorder()
    {
        $items = Item::all();
        return view('addorder',['items'=>$items]);
    }
    public function findPrice($id)
    {
        $p=DB::table('items')->where('id', $id)->pluck('price');
        return response()->json($p);
    }
    
}
