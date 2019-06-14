# pizzaria

get('/pizzas') -> retorna todas as pizzas

post('/pizzas') -> (
            string('nome',200)
            char('tamanho','1')
            text('sabores')
            double('preco',6,2)
) -> cria uma pizza

get('/pizzas/{pizzas}') -> retorna a pizza identificada pelo id

put ou patch('/pizzas/{pizzas}') -> (
            string('nome',200)
            char('tamanho','1')
            text('sabores')
            double('preco',6,2)
) -> atualiza dados de uma pizza

delete('/pizzas/{pizzas}') -> elimina uma pizza


get('/clientes') -> retorna a lista de clientes

post('/clientes') -> (
            string('nome', 100)
            string('telefone',11)
            string('endereco')
) -> cria um cliente

get('/clientes/{clientes}') -> retorna o cliente identificado pelo id

put ou patch('/clientes/{clientes}') -> (
            string('nome', 100)
            string('telefone',11)
            string('endereco')
) -> atualiza um cliente

$router->delete('/clientes/{clientes}) -> elimina um cliente


$router->get('/pedidos') -> retorna todos os pedidos
$router->get('/pedidos/{pedidos}') -> retorna o pedido identificado pelo id


get('/clientes/{clientes}/pedidos') -> retorna todos os pedidos de um cliente identificado pelo id

$router->post('/clientes/{clientes}/pedidos') -> cria um pedido para o cliente identificado pelo id

put ou patch('/clientes/{clientes}/pedidos/{pedidos}') -> (
            integer('cliente_id')
) -> troca o pedido identificado pelo id do pedido e do cliente para um novo cliente passado no request 

delete('/clientes/{clientes}/pedidos/{pedidos}') -> elimina o pedido (deve estar vazio, sem pizzas)



get('/pedidos/{pedidos}/pizzas') -> retorna as pizzas incluidas dentro do pedido identificado pelo id

post('/pedidos/{pedidos}/pizzas/{pizzas}') -> Adiciona a pizza identificada pelo id ao pedido (já existente) identificado pelo id.

delete('/pedidos/{pedidos}/pizzas/{pizzas}') -> elimina a pizza identificada pelo id do pedido identificado pelo id