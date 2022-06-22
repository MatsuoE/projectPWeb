<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\product;
use App\Models\category;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'ikhsan',
            'email' => 'ikhsan@mail.com',
            'isAdmin' => 1,
            'password' => bcrypt('ikhsan123')
        ]);

        category::create([
            'name' => 'Dapur',
            'slug' => 'dapur'
        ]);

        category::create([
            'name' => 'Ruang Tengah',
            'slug' => 'ruang-tengah'
        ]);

        category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        product::factory(12)->create();

        // product::create([
        //     'title' => 'Kulkas 4 Pintu',
        //     'slug' => 'kulkas-4-pintu',
        //     'excerpt' => 'ini adalah kulkas 4 pintu dari samsung',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum expedita vel a magnam esse perspiciatis asperiores earum nobis nam laboriosam!',
        //     'price' => 14000,
        //     'category_id' => 1
        // ]);

        // product::create([
        //     'title' => 'TV 50 Inch',
        //     'slug' => 'tv-50-inch',
        //     'excerpt' => 'ini adalah TV 50 Inch dari samsung',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum expedita vel a magnam esse perspiciatis asperiores earum nobis nam laboriosam!',
        //     'price' => 14000,
        //     'category_id' => 2
        // ]);

        // product::create([
        //     'title' => 'Laptop 14 Inch',
        //     'slug' => 'Laptop 14 Inch',
        //     'excerpt' => 'ini adalah Laptop 14 Inch dari samsung',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum expedita vel a magnam esse perspiciatis asperiores earum nobis nam laboriosam!',
        //     'price' => 14000,
        //     'category_id' => 3
        // ]);
    }
}
