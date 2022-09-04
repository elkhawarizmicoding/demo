<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "clients";
    protected $guarded = ["id"];
    protected $fillable = [
        "full_name",
        "email",
        "password"
    ];
    protected $hidden = ["password"];

    public function orders(){
        return $this->hasMany(Order::class);
    }


}
