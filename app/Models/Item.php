<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['name','price','category_id','discount','discount_type','addons','user_id','description','img','variant'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function user(){
       return $this->belongsTo(User::class);
    }



}
