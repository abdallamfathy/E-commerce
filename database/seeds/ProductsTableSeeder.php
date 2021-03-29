<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Product::class, 30)->create();

            // App\Product::create([
            //     'name' => 'welcome homie',
            //     'image' => '\uploads\products\16166522762020_05_15_04_27_IMG_3624.PNG',
            //     'discription' => 'genetral abfer war was in the prsian bujsa j uasd nad i a and i can s o ir ne ackse ajsdnm asawqqw q;;lksa zxc ',
            //     'price' => 1000
            // ]);
         

    }
}
