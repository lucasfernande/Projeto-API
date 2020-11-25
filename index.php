<?php 

    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/postagens[/{ano}[/{mes}]]', function($request, $response) {
    	$ano = $request->getAttribute('ano');
    	$mes = $request->getAttribute('mes');
        echo 'lista de postagens';
        echo '<br>';
        echo 'ano: '.$ano;
        echo '<br>';
        echo 'mes: '.$mes;
    });

    					# com os [], o id se torna opcional    
    $app->get('/usuarios[/{id}]', function($request, $response) {
    	$id = $request->getAttribute('id');
        echo 'lista de usuarios';
        echo '<br>'.$id;
    });

    # recebendo vários itens
    $app->get('/lista/{itens:.*}', function($request, $response) {
    	$itens = $request->getAttribute('itens');
       	
       	echo '<pre>';
       		print_r(explode('/', $itens));
       	echo '</pre>';	
    });

    $app->get('/blog/postagens/{id}', function($request, $response) {
    	echo 'listar postagem para um id: ';
    })->setName('blog');

    $app->get('/meusite', function() {
    	$retorno = $this->get('router')->pathFor('blog', ['id' => '5']);
    	# /slim/blog/postagens/5
    	echo $retorno;
    });

    # agrupando rotas
    $app->group('/v1', function() {

    	$this->get('/posts', function() {
    		echo 'Posts V1';
   		});

   		$this->get('/users', function() {
    		echo 'Users V1';
   		});

    });

    $app->group('/v2', function() {

    	$this->get('/posts', function() {
    		echo 'Posts V2';
   		});

   		$this->get('/users', function() {
    		echo 'Users V2';
   		});

    });





    $app->run();

?>