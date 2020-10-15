<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;

/**
 * @property-read string image_url
 */
trait HasImage
{
    public function imageUrl() : string
    {
        return url(Str::replaceFirst('public', 'storage', $this->image));
    }

    public function getImageUrlAttribute() : string
    {
        return $this->imageUrl();
    }
}
