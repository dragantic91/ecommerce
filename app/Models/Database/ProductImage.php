<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 07-Dec-17
 * Time: 17:24
 */
namespace App\Models\Database;

use App\Image\LocalFile;

class ProductImage extends BaseModel
{
    protected $fillable = ['product_id', 'path', 'is_main_image'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPathAttribute()
    {
        if (null === $this->attributes['path'] || empty($this->attributes['path'])) {
            return NULL;
        }
        $localImage = new LocalFile($this->attributes['path']);

        return $localImage;
    }
}