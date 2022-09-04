<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $fillable = [
        'product_id',
        'client_id',
        'ref_order',
        'total',
        'qt',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
