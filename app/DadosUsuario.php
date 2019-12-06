<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosUsuario extends Model
{
    protected $fillable = [
      'nome',
      'rg',
      'nascimento',
      'orgaoEmissor',
      'orgaoEmissorUF',
      'cpf',
      'tituloEleitoral',
      'filiacao',
      'endereco',
      'num',
      'bairro',
      'cidade',
      'uf',
      'foneResidencial',
      'foneCelular',
      'foneComercial',
    ];
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
