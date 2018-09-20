<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use Faker\Factory as Fake;

class PostDatabaseSeeder extends Seeder
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
            DB::table('post__posts')->insert([
                'title' => $fake->title,
                'content'=>$fake->text,
                'category_id' => rand(0,50),
                'user_id'=>rand(1,5)
            ]);
        }
    }
}
