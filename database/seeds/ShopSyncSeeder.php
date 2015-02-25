<?php
use Illuminate\Database\Seeder;
use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\MicroweberProduct;
use Netshell\ShopSync\Models\EbayProduct;
use Netshell\ShopSync\Models\Order;

class ShopSyncSeeder extends Seeder
{

    public function run()
    {
        \DB::table('products')->truncate();
        \DB::table('products_microweber')->truncate();
        \DB::table('products_ebay')->truncate();
        \DB::table('orders')->truncate();
        for($ii=1; $ii<=3; $ii++) {
            $p = new Product(['user_id' => 1]);
            $p->save();
            (new MicroweberProduct(['name' => 'Microweber Test'.$ii]))
            	->product()->associate($p)->save();
            (new EbayProduct(['name' => 'Ebay Test '.$ii]))
            	->product()->associate($p)->save();
            $p->save();

            (new Order())->product()->associate($p)->save();
        }
    }

}
