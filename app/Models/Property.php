<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'no_of_rooms',
        'no_of_bathrooms',
        'price',
        'type',
        'location',
        'photo',
    ];

    protected $appends = [
        'photo_url', // Append the photo URL to the array/json representations
    ];

    /**
     * Get the URL of the property's photo.
     *
     * @return string
     */
    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo) {
            // Generate a URL for the photo using the 'public' disk
            return Storage::disk('public')->url("properties/{$this->photo}");
        }

        // Return a default image if there's no photo
        return asset('images/default-property.png');
    }

    // Other model methods and properties...
}
