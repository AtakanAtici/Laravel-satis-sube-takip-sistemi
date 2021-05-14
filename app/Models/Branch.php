<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table ='branches';
    protected $fillable = ['branch_no', 'name', 'tel_no','email', 'adress', 'start_date' , 'author_name', 'author_tel' ];
}
