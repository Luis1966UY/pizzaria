<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'tamanho',
        'sabores',
        'created_at',
        'updated_at'
    ];

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido');
    }
}