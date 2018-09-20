<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use Faker\Factory as Fake;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $fake = Fake::create();
        for ($i=0;$i<50;$i++){
            DB::table('category__categories')->insert([
                'name' => $fake->name,
                'parent_id' => rand(0,50),
                'type' => $fake->randomElement($array = array('industry','interest'))
            ]);
        }
        // $this->call("OthersTableSeeder");
    }
}
