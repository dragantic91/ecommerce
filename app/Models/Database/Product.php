<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/26/2017
 * Time: 12:17 PM
 */

namespace App\Models\Database;


use App\Image\LocalFile;
use Illuminate\Support\Str;

class Product extends BaseModel
{
    protected $fillable =['type', 'name', 'slug', 'product_no', 'description', 'status', 'in_stock', 'track_stock', 'qty', 'is_taxable', 'page_title', 'page_description', 'price', 'discount', 'discount_price', 'delivery', 'delivery_price', 'new_product', 'hit_product'];

    public static function getCollection()
    {
        $model = new static;
        $products = $model->all();
        $productCollection = new ProductCollection();
        $productCollection->setCollection($products);
        return $productCollection;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = Str::slug($model->name);
            $count = static::where("slug", "=", $slug)->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public static function getProductsBySlug($slug)
    {
        $model = new static;
        return $model->where('slug', '=', $slug)->first();
    }

    public function saveProduct($request)
    {
        /**
         * SAVING PRODUCT BASIC FIELDS
         */
        $this->update($request->all());

        /**
         * SAVING PRODUCT PRICES
         */
        /*
        if ($this->prices()->get()->count() > 0) {
            $this->prices()->get()->first()->update(['price' => $request->get('price')]);
        } else {
            $this->prices()->create(['price' => $request->get('price')]);
        }
        */

        /**
         * SAVING PRODUCT IMAGES
         */
        if (null !== $request->get('image')) {
            $exitingIds = $this->images()->get()->pluck('id')->toArray();
            foreach ($request->get('image') as $key => $data) {
                if (is_int($key)) {
                    if (($findKey = array_search($key, $exitingIds)) !== false) {
                        $productImage = ProductImage::findorfail($key);
                        $productImage->update($data);
                        unset($exitingIds[$findKey]);
                    }
                    continue;
                }
                ProductImage::create($data + ['product_id' => $this->id]);
            }
            if (count($exitingIds) > 0) {
                ProductImage::destroy($exitingIds);
            }
        }

        /**
         * SAVING PRODUCT CATEGORIES
         */
        if (count($request->get('category_id')) > 0) {
            $this->categories()->sync($request->get('category_id'));
        }
    }

    public function getImages()
    {
        $id = $this->id;
        $images = $this->images()->where('product_id', '=', $id)->get();

        return $images;
    }

    public function getImageAttribute()
    {
        $defaultPath = "/front/assets/img/default-product.jpg";
        $image = $this->images()->where('is_main_image', '=', 1)->first();

        if (null === $image) {
            return new LocalFile($defaultPath);
        }

        if ($image->path instanceof LocalFile) {
            return $image->path;
        }
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}