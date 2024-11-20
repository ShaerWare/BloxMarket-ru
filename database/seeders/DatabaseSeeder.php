<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductsAttrTableSeeder::class);
        $this->call(productsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);

        $this->call(ProductsImagesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(ProductFiltersTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(DeliveryAddressTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
    }
}
