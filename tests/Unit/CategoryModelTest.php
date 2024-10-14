<?php

use App\Models\Category;

test('it should create a new Product', function () {
    $product = new Category([
        'name' => 'Accessories',
        'description' => 'Walk like a winner, swim like a worm, float like a...floaty? With this pack you become a true Roblox Athlete!',
        'image' => 'https://via.placeholder.com/640x480.png/003322?text=voluptates',
        'parent_id' => 0,
        'order' => 1,
        'slug' => 'accessories',
        'is_active' => false,
    ]);

    expect($product->name)->toBe('Accessories')
        ->and($product->description)->toBe('Walk like a winner, swim like a worm, float like a...floaty? With this pack you become a true Roblox Athlete!')
        ->and($product->image)->toBe('https://via.placeholder.com/640x480.png/003322?text=voluptates')
        ->and($product->parent_id)->toBe(0)
        ->and($product->slug)->toBe('accessories')
        ->and($product->is_active)->toBe(false)
        ->and($product->order)->toBe(1);
});
