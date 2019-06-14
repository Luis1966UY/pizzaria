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
            $telefone = $request->get('telefone');
            $endereco = $request->get('endereco');

            $cliente->nome = $nome;
            $cliente->telefone = $telefone;
            $cliente->endereco = $endereco;

            $cliente->save();

            return $this->createResponse("O cliente $cliente->id foi atualizado", 200);
        }

        return $this->createResponseError("Não existe nenhum cliente com esse id", 404);
    }

    public function destroy($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {
            if (sizeof($cliente->pedidos) > 0) {
                return $this->createResponseError("Esse cliente tem pedido registrados. Tem que eliminar os pedidos antes de eliminar o clientee.", 409);
            }
            $cliente->delete();

            return $this->createResponse("O cliente $cliente->id foi eliminado", 200);
        }
        return $this->createResponseError("Não existe um cliente com esse id", 404);
    }

    public function validation($request)
    {
        $rules = [
            'nome' => 'required',
            'telefone' => 'required|numeric',
            'endereco' => 'required',
        ];

        $this->validate($request, $rules);
    }
}
