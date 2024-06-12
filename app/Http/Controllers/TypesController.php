<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypesController extends Controller
{
    //Função para mostrar a view do index
    public function index()
    {
        return view(
            'types.index',
            //Select * from type
            ['types' => Type::all()]
        );
    }

    public function create()
    {
        return view('types.create');
        
    }

    //função chamada no submit do form..
    //será um POST com os dados
    public function store(Request $request)
    {
        
        //Criando validações para os dados preenchidos pelo usuário
        $request->validate([
            'name' => 'required|min:2|max:30'
        ]);
        
        //não esquecer import do Type model.
        Type::create([
            'name' => $request->name
        ]);
        return redirect('/types')->with('success', 'Tipo cadastrado com sucesso!');;
    }

    public function edit($id)
    {
        //find é o método que faz select * from types where id= ?
        $type = Type::find($id);
        //retornamos a view passando a TUPLA de tipo consultado
        return view('types.edit', ['type' => $type]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30'
        ]);

        $type = Type::find($request->id);
        //método update faz um update type set name = ? etc...
        $type->update([
            'name' => $request->name
        ]);
        return redirect('/types')->with('success', 'Tipo atualizado
        com sucesso!');
    }

    public function destroy($id)
    {
        //select * from type where id = ?
        $type = Type::find($id);
        //deleta o tipo no banco
        $type->delete();
        return redirect('/types')->with('success', 'Tipo excluído com sucesso!');
    }
}