<?php

use App\Models\Product;

test('it should create a new Product', function () {
    $product = new Product([
        'name' => 'adidas Sports',
        'detail' => 'Walk like a winner, swim like a worm, float like a...floaty? With this pack you become a true Roblox Athlete!',
        'image' => 'https://via.placeholder.com/640x480.png/003322?text=voluptates',
        'filename' => 'https://via.placeholder.com/640x480.png/003322?text=voluptates',
        'price' => 2500,
        'slug' => 'adidas-sports',
        'is_active' => false,
        'sku' => 'ADSP',
    ]);

    expect($product->name)->toBe('adidas Sports')
        ->and($product->detail)->toBe('Walk like a winner, swim like a worm, float like a...floaty? With this pack you become a true Roblox Athlete!')
        ->and($product->image)->toBe('https://via.placeholder.com/640x480.png/003322?text=voluptates')
        ->and($product->filename)->toBe('https://via.placeholder.com/640x480.png/003322?text=voluptates')
        ->and($product->price)->toBe(2500)
        ->and($product->slug)->toBe('adidas-sports')
        ->and($product->is_active)->toBe(false)
        ->and($product->sku)->toBe('ADSP');
});
