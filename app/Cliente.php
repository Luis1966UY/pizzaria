<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'endereco',
        'created_at',
        'updated_at'
    ]; 

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }   
}