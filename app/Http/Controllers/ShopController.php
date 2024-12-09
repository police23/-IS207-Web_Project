<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index() {
        $phone = Phone::orderBy("created_at","desc")->paginate(12);
        return view("shop", compact("phone"));
    }
}
