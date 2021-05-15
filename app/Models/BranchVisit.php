<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchVisit extends Model
{
    use HasFactory;

    protected $table = 'branch_visits';
    protected $fillable = ['personelID','branchID', 'status', 'image', 'personel_location', 'description', 'visit_date'];
}
