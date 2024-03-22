<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fullname',
        'address',
        'contact_no',
        'purpose',
        'status',
    ];
}
