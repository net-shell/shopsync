<?php
use Illuminate\Database\Seeder;
use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\Listing;
use Netshell\ShopSync\Models\MicroweberProduct;
use Netshell\ShopSync\Models\EbayProduct;
use Netshell\ShopSync\Models\Order;
use Netshell\ShopSync\Drivers\Ebay;

class ShopSyncSeeder extends Seeder
{

    public function run()
    {
        \DB::table('listings')->truncate();
        \DB::table('products')->truncate();
        \DB::table('products_microweber')->truncate();
        \DB::table('products_ebay')->truncate();
        $L = new Listing(['name' => 'Default', 'user_id' => 1]);
        $L->save();
        \DB::table('orders')->truncate();
        for($ii=1; $ii<=5; $ii++) {
            $p = new Product(['name' => "Product $ii", 'listing_id' => $L->id]);
            $p->save();
            if($ii%2) {
                (new MicroweberProduct(['name' => "Microweber Test $ii"]))
                ->product()->associate($p)->save();
            }
            else {
                (new EbayProduct(['name' => "Ebay Test $ii"]))
                ->product()->associate($p)->save();
            }
            
            if($ii%3) {
                (new Order())->product()->associate($p)->save();
            }
        }

        \DB::table('categories')->truncate();
        (new Ebay(app()['config']['services.ebay']))->seedCategories();
    }

}
