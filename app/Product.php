<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'products';
    //protected $fillable = ['name','slug','price','description'];      //belirtilen kolonlara ekleme yapılabilir.
    protected $guarded = [];                                            // tüm kolonlar eklenip güncellenebilir.
}
