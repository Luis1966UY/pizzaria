<?php
namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return $this->createResponse($clientes, 200);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente) {
            return $this->createResponse($cliente, 200);
        }

        return $this->createResponseError('Cliente não encontradod', 404);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        Cliente::create($request->all());

        return $this->createResponse('O cliente foi criado', 201);
    }

    public function update(Request $request, $cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {
            $this->validation($request);

            $nome = $request->get('nome');
            $endereco = $request->get('endereco');
            $telefone = $request->get('telefone');

            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
            $cliente->telefone = $telefone;

            $cliente->save();

            return $this->createResponse("O cliente $cliente->id foi atualizado", 200);
        }

        return $this->createResponseError("Não existe cliente com esse ID", 404);
    }

    public function destroy($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {
            $cliente->courses()->sync([]);
            $cliente->delete();

            return $this->createResponse("O cliente $cliente->id foi eliminado", 200);
        }
        return $this->createResponseError("Não existe cliente com esse ID", 404);
    }

    public function validation($request)
    {
        $rules = [
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'required|numeric',
        ];

        $this->validate($request, $rules);
    }
}
