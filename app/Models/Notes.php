<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    protected $table ='notes';
    protected $fillable = ['senderID', 'to_roleID', 'subject', 'note'];

}
