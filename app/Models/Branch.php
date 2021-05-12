<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table ='branches';
    protected $fillable = ['name', 'tel_no', 'adress', 'author_name', 'author_tel' ];
}
