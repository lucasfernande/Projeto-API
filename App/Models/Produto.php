<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Produto extends Model {

        protected $fillable = [ # campos que podem ser preenchidos
            'titulo',
            'descricao',
            'preco',
            'fabricante',
            'updated_at',
            'created_at'
        ];

    }

?>