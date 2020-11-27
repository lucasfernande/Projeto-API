<?php

    # db.php vai rodar somente em linha de comando (cli)
    if (PHP_SAPI != 'cli') {
        exit('Rodar via CLI');
    }

    require __DIR__ . '/vendor/autoload.php';
    
    $settings = require __DIR__ . '/src/settings.php';
    $app = new \Slim\App($settings);

    require __DIR__ . '/src/dependencies.php';

    $db = $container->get('db');

    $schema = $db->schema();
    $tabela = 'produtos';

    $schema->dropIfExists($tabela);

    $schema->create($tabela, function($table) {
        $table->increments('id');
        $table->string('titulo', 100);
        $table->text('descricao');
        $table->decimal('preco', 11, 2);
        $table->string('fabricante', 60);
        $table->timestamps();
    });

    # registros de teste
    $db->table($tabela)->insert([
        'titulo' => 'Motorola Moto G6',
        'descricao' => 'Bla Bla',
        'preco' => 899.90,
        'fabricante' => 'Motorola',
        'created_at' => '2019-10-22',
        'updated_at' => '2019-10-22'
    ]);

    $db->table($tabela)->insert([
        'titulo' => 'Iphone X',
        'descricao' => 'Bla Bla',
        'preco' => 4999.00,
        'fabricante' => 'Apple',
        'created_at' => '2020-10-01',
        'updated_at' => '2020-10-01'
    ]);

?>    
