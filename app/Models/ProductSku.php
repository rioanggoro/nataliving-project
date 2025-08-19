<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_skus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'sku',
        'name',
    ];

    /**
     * Get the product that owns the SKU.
     * Mendefinisikan relasi bahwa setiap SKU "milik" satu Produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
