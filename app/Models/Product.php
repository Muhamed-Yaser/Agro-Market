<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'description' , 'price' , 'compare_price' , 'product_image' , 'type' , 'user_id'
    ];

    public static function rules()
    {
        return [
            'name' => "required|string|max:255",
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:5000',
            'price' => 'required|max:255',
            'compare_price' => 'required|max:255',
            'type' => 'required|string|in:Veg,Fruits',
        ];
    }

    // //Accessor
    // public function getIProductImageAttribute()
    // {
    //     if (!$this->product_image) {
    //         return 'https://grafgearboxes.com/productos/images/df.jpg';
    //     }
    //     if (Str::startsWith($this->product_image, ['http://', 'https://'])) {
    //         return $this->product_image;
    //     }
    //     return asset('storage/' . $this->product_image);
    // }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
