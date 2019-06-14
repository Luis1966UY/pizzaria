<?php
namespace App\Http\Controllers;

use App\Pedido;

class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::all();
        return $this->createResponse($pedidos, 200);
    }

    public function show($id){
        $pedido = Pedido::find($id);

        if($pedido){
            return $this->createResponse($pedido, 200);
        }

        return $this->createResponseError('Pedido não encontrado', 404);
    }

}
