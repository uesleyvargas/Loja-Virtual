<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    //função que irá mostrar a view de listagem
    //passando como parâmetro a consulta no banco com ::all()
    public function index()
    {
        return view('products.index', [
            //Select * from products
            'products' => Product::all()
        ]);
    }


    public function create()
    {
        return view('products.create', ['types' => Type::all()]);
        
    }

    //função chamada no submit do form..
    //será um POST com os dados
    public function store(Request $request)
    {
        
        //Criando validações para os dados preenchidos pelo usuário
        $request->validate([
            'name' => 'required|min:2|max:30',
            'description' => 'max:200',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric'
        ]);
        
        //não esquecer import do Product model.
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        return redirect('/products')->with('success', 'Produto cadastrado com sucesso!');;
    }



    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $product = Product::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('products.edit', ['product' => $product, 'types' => Type::all()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'description' => 'max:200',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric'
        ]);

        $product = Product::find($request->id);
        //método update faz um update product set name = ? etc...
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        return redirect('/products')->with('success', 'Produto atualizado
        com sucesso!');
    }


    public function destroy($id)
    {
        //select * from product where id = ?
        $product = Product::find($id);
        //deleta o produto no banco
        $product->delete();
        return redirect('/products')->with('success', 'Produto excluído com sucesso!');
    }

}
