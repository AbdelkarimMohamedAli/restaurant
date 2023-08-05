<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;
    use Search;
    protected $searchable = [
        'name',
    ];
    protected $fillable=['name','price'];
}
