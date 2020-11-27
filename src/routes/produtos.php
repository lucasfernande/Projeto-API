<?php

    use Slim\Http\Request as Request;
    use Slim\Http\Response as Response;
    use App\Models\Produto;

    # rotas para produtos
    # ORM - Object Relational Mapper
    $app->group('/api/v1', function() {

        $this->get('/produtos/lista', function(Request $request, Response $response) {
            $produtos = Produto::get();            
            return $response->withJson($produtos); # retornando registro do banco de dados em formato json
        });

        # adicionando um item
        $this->post('/produtos/add', function(Request $request, Response $response) {
            $dados = $request->getParsedBody();
            $produto = Produto::create($dados);            
        }); 

        # recuperando item pelo id
        $this->get('/produtos/lista/{id}', function(Request $request, Response $response, $args) {
            $produto = Produto::findOrFail($args['id']);
            return $response->withJson($produto); 
        });

        # atualizando um item pelo id
        $this->put('/produtos/update/{id}', function(Request $request, Response $response, $args) {
            $dados = $request->getParsedBody();
            $produto = Produto::findOrFail($args['id']);
            $produto->update($dados);
            return $response->withJson($produto); 
        });

        # deletando item pelo id
        $this->get('/produtos/remove/{id}', function(Request $request, Response $response, $args) {
            $produto = Produto::findOrFail($args['id']);
            $produto->delete();
            return $response->withJson($produto); 
        });


    });

?>