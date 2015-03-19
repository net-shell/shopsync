<?php

use Illuminate\Database\Seeder;
use Netshell\ShopSync\Drivers\Ebay;

class CategoriesSeeder extends Seeder
{

    public function run()
    {
        \DB::table('categories')->truncate();
        (new Ebay(app()['config']['services.ebay']))->seedCategories();
    }

}
