<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

     protected $fillable = [
        'portfolio_name',
        'user_id',
        'portfolio_string',
        'portfolio_image',
        'portfolio_description',
        'status'
    ];
}
