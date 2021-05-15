<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable =['personelID', 'customerID', 'product_name', 'piece', 'piece_price', 'total_price', 'sales_note'];
}
