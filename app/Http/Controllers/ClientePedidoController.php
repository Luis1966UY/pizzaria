<?php
namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use Illuminate\Http\Request;

class ClientePedidoController extends Controller
{
    public function index($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {
            $pedidos = $cliente->pedidos;

            return $this->createResponse($pedidos, 200);
        }

        return $this->createResponseError('Não se encontra o cliente com esse id', 404);
    }

    public function store(Request $request, $cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {

            $fields = $request->all();
            $fields['cliente_id'] = $cliente_id;

            Pedido::create($fields);

            return $this->createResponse('O pedido foi criado', 200);
        }
        return createResponseError("Não existe um cliente com esse id", 404);
    }

    public function update(Request $request, $cliente_id, $pedido_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {
            $pedido = Pedido::find($pedido_id);

            if ($pedido) {

                $pedido->cliente_id = $request->get('cliente_id');
                $pedido->save();

                return $this->createResponse('O pedido foi atualizado', 200);
            }
            return $this->createResponseError('Não foi encontrado um pedido com esse id', 404);
        }
        return $this->createResponseError('Não foi encontrado um cliente com esse id', 404);
    }

    public function destroy($cliente_id, $pedido_id)
    {
        $cliente = Cliente::find($cliente_id);

        if ($cliente) {
            $pedidos = $cliente->pedidos();

            if ($pedidos->find($pedido_id)) {
                $pedido = Pedido::find($pedido_id);

                $pedido->pizzas()->detach();

                $pedido->delete();

                return $this->createResponse("Pedido eliminado", 200);
            }
            return $this->createResponseError('Não foi encontrado um pedido com esse id asociado a esse cliente', 404);
        }
        return $this->createResponseError('Não foi encotrado um cliente com esse id', 404);
    }

}
