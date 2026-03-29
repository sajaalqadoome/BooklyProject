<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'price',
        'stock',
        'description',
        'category_id',
        'image',
        'pdf_file'
    ];

public function category()
{
    return $this->belongsTo(Category::class);
}
public function subcategory()
{
    return $this->belongsTo(Subcategory::class,'category_id');
}



public function orderItems()
{
    return $this->hasMany(OrderItem::class);

}
   public function cartItems()
{
        return $this->hasMany(CartItem::class);
}

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
public function wishlistedBy()
{
    return $this->belongsToMany(User::class, 'wishlists');
}


    }
