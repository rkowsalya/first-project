<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = ['product_name','description','price','selling_price','quantity','category_id','expire_date','stock','thumb_img','image'
    ];

    public function categoryname()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
