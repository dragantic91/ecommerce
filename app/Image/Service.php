<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/22/2017
 * Time: 6:23 PM
 */

namespace App\Image;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class Service extends ImageManager
{

    /**
     * Image Service Image
     */
    public $image = NULL;

    /**
     * Upload Image and resize it
     */
    public function upload($image, $path = null, $keepAspectRatio = true)
    {
        $this->image = parent::make($image);
        $this->directory(public_path($path));

        $name = $image->getClientOriginalName();

        $fullPath = public_path($path) . "/" . $name;


        if(!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true);
        }

        $this->image->save($fullPath);

        $sizes = config('image.sizes');

        foreach($sizes as $sizeName => $widthHeight) {

            list($width, $height) = $widthHeight;

            $image = parent::make($fullPath);
            $image->fit($width, $height);

            $sizePath = $image->dirname . "/" . $sizeName .  "-" .$image->basename;
            $image->save( $sizePath);
        }

        $localImage = new LocalFile($path . "/" . $name);

        return $localImage;
    }

    /**
     * Create Directories if not exists
     */
    public function directory($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true, true);
        }
        return $this;
    }

    /**
     * @todo destroy the image from path
     */
    public function destroy() {
        dd($this);
    }
}