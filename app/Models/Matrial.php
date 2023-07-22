<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrial extends Model
{
    use HasFactory;
    protected $fillable=['name','price','unit_id'];
    public function unit(){
       return $this->belongsTo(Unit::class);
    }
}
