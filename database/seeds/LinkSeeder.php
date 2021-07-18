<?php

use App\Link;
use App\LinkProduct;
use App\Product;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Link::class, 30)->create()->each(function(Link $link){
            LinkProduct::create([
                'link_id' => $link->id,
                'product_id' => Product::inRandomOrder()->first()->id
            ]);
        });
    }
}
