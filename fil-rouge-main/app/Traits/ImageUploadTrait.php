<?php

// app/Traits/ImageUploadTrait.php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Log;

trait ImageUploadTrait
{
    private function storeImage($image)
    {
        $directory = 'images';
        $storedPath = $image->store($directory, 'public');

        // Debugging: Log the stored image path
        Log::info('Stored image path: ' . $storedPath);

        return $storedPath;
    }

    public function createImageRecord($imagePath, $imageableId, $imageableType)
    {
        // Create a new Image record linked to the specified model
        Image::create([
            'path' => $imagePath,
            'imageable_id' => $imageableId,
            'imageable_type' => $imageableType,
        ]);
    }
}

