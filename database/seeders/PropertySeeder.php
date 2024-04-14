<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [
                'title' => 'Modern Apartment',
                'description' => 'A stylish apartment in the heart of the city, perfect for young professionals. Featuring 3 bedrooms, 2 bathrooms, and a state-of-the-art kitchen.',
                'no_of_rooms' => 3,
                'no_of_bathrooms' => 2,
                'price' => 500000,
                'type' => 'Apartment',
                'location' => 'Downtown City Center',
                'photo' => 'properties/apartment.jpg', 
            ],
            [
                'title' => 'Cozy Cottage',
                'description' => 'A cozy cottage located in the serene outskirts of the city, ideal for a family looking for peace and tranquility. It includes a large garden.',
                'no_of_rooms' => 4,
                'no_of_bathrooms' => 2,
                'price' => 300000,
                'type' => 'House',
                'location' => 'Rural Countryside',
                'photo' => 'properties/cottage.jpg', 
            ],
            [
                'title' => 'Luxury Villa',
                'description' => 'An exquisite villa with breathtaking sea views, featuring 5 bedrooms, 4 bathrooms, a swimming pool, and private access to the beach.',
                'no_of_rooms' => 5,
                'no_of_bathrooms' => 4,
                'price' => 1200000,
                'type' => 'House',
                'location' => 'Coastal Area',
                'photo' => 'properties/villa.jpg', 
            ]
        ]);
    }
}
