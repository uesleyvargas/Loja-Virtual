<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index() {

        $types = Type::all();
        $products = Product::where('quantity', '>', 0)->get();
        // Passando a variável $types para a view
        return view('welcome', compact('types', 'products'));
    }

    public function filterProduct($typeId) {
        $types = Type::all();
        $products = Product::where('type_id', $typeId)->where('quantity', '>', 0)->get();
        // Passando a variável $types para a view
        return view('welcome', compact('types', 'products'));
    }
}