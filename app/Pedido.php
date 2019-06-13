<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id'
        'created_at',
        'updated_at'
    ];

    public function pizzas()
    {
        return $this->belongsToMany('App\Pizza');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}