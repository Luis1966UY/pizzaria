<?php
namespace App\Http\Controllers;

use App\Pedido;
use App\Pizza;

class PedidoPizzaController extends Controller
{
    public function index($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);

        if ($pedido) {
            $pizzas = $pedido->pizzas;

            return $this->createResponse($pizzas, 200);
        }

        return $this->createResponseError('Não se encontra nenhum pedido com esse id', 404);
    }

    public function store($pedido_id, $pizza_id)
    {
        $pedido = Pedido::find($pedido_id);

        if ($pedido) {
            $pizza = Pizza::find($pizza_id);

            if ($pizza) {
                $pizzas = $pedido->pizzas();

                $pedido->pizzas()->attach($pizza_id);
                return $this->createResponse("A pizza $pizza_id foi adicionada ao pedido $pedido_id", 201);
            }
            return createResponseError('Não existe nenhuma pizza com esse id', 404);
        }

        return createResponseError('Não existe nenhum pedido com esse id', 404);
    }

    public function destroy($pedido_id, $pizza_id)
    {
        $pedido = Pedido::find($pedido_id);

        if ($pedido) {
            $pizzas = $pedido->pizzas();

            if ($pizzas->find($pizza_id)) {
                $pizzas->detach($pizza_id);

                return $this->createResponse("Pizza eliminada do pedido", 200);
            }
            return createResponseError('Não se encontra uma pizza com esse id em este pedido', 404);
        }
        return createResponseError('Não se encontra um pedido com esse id', 404);
    }
}
