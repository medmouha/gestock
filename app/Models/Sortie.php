<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'product_id',
        'user_id'
    ];

    public function products() {
        return $this->belongsTo(Product::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
