<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    use HasFactory;

    protected $table = 'variants';
    protected $primaryKey = 'id_variants';
    protected $guarded = [];
}
