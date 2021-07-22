<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    function index() {
        $foods = Food::all();
        return view('admin.foods.list', compact('foods'));
    }
}
