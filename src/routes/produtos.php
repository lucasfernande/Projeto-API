<?php

    use Slim\Http\Request as Request;
    use Slim\Http\Response as Response;

    # rotas para produtos
    $app->group('/api/v1', function() {

        $this->get('/produtos', function(Request $request, Response $response) {
            return $response->withJson(['titulo' => 'Moto G6']);
        });

    });

?>