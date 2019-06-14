<?php
namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return $this->createResponse($pizzas, 200);
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);

        if ($pizza) {
            return $this->createResponse($pizza, 200);
        }

        return $this->createResponseError('Pizza não encontrada', 404);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        Pizza::create($request->all());

        return $this->createResponse('A pizza foi criada', 201);
    }

    public function update(Request $request, $pizza_id)
    {
        $pizza = Pizza::find($pizza_id);

        if ($pizza) {
            $this->validation($request);

            $nome = $request->get('nome');
            $tamanho = $request->get('tamanho');
            $sabores = $request->get('sabores');
            $preco = $request->get('preco');

            $pizza->nome = $nome;
            $pizza->tamanho = $tamanho;
            $pizza->sabores = $sabores;
            $pizza->preco = $preco;

            $pizza->save();

            return $this->createResponse("A pizza $pizza->id foi atualizada", 200);
        }

        return $this->createResponseError("Esse ID de pizza não existe", 404);
    }

    public function destroy($pizza_id)
    {
        $pizza = Pizza::find($pizza_id);

        if ($pizza) {
            
            $pizza->delete();

            return $this->createResponse("A pizza $pizza->id foi eliminada", 200);
        }
        return $this->createResponseError("Esse ID de pizza não existe", 404);
    }

    public function validation($request)
    {
        $rules = [
            'nome' => 'required',
            'tamanho' => 'required',
            'sabores' => 'required',
            'preco' => 'required|numeric'
        ];

        $this->validate($request, $rules);
    }
}
